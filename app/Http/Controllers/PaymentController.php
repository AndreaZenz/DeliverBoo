<?php
namespace App\Http\Controllers;

use App\Restaurant;
use App\Dish;
use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'vqc22hrt6gtdftfp',
            'publicKey' => '2f2dmfxdjz3rbvnr',
            'privateKey' => 'b1598b6de6bd124c586691ed53636d18'
        ]);

        //SETP1 Your front-end requests a client token from your server and initializes the client SDK.
        $token = $gateway->clientToken()->generate(); //genero il token del cliente senza id
    

        return view("payment.index", compact('token'));
    }

    public function checkout(Request $request)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'vqc22hrt6gtdftfp',
            'publicKey' => '2f2dmfxdjz3rbvnr',
            'privateKey' => 'b1598b6de6bd124c586691ed53636d18'
        ]);

        $amount = $request->amount;
        

        $nonce = $request->payment_method_nonce;


        //dati inviati al sito braintree
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => 'Alessandro',
                'lastName' => 'Sainato',
                'email' => 'alessandro.sainato@boolean.com',
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
    
        if ($result->success) {
            $transaction = $result->transaction;

            
            $order = new Order();
            $data =  $request->all();

            $data['restaurant_id'] = (int)$data['restaurant_id'];   
            $data['total_price'] = $data['amount'];

            $order->fill($data);
            $order->save();
    
            return view('payment.checkout')->with('success_message', 'The payment was successfully. The id:'. $transaction->id);
        } else {
            $errorString = "";
    
            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
    
            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return back()->withErrors('Il pagamento non è andato a buon fine: '.$result->message);
        }
    }
}
