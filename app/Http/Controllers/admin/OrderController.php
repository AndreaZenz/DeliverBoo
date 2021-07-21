<?php

namespace App\Http\Controllers\admin;

use App\Order;
use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = [
            'restaurants' => Restaurant::All()
        ];

        $orders = [
            'orders' => Order::All()
        ];

        return view('admin.orders', $restaurants, $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { {
            $dish = $request->all();
            // $data = $request->validated();

            $order = new Order();
            $order["total"] = $data["total"];
            $order["client_name"] = $data["client_name"];
            $order["client_surname"] = $data["client_surname"];
            $order["client_email"] = $data["client_email"];
            $order["client_phone"] = $data["client_phone"];
            $order["client_address"] = $data["client_address"];
            $order["is_payed"] = 0;

            $order->getRestaurant()->associate($data["restaurant_id"]);
            $order->save();
            $order->getDishes()->attach(explode(",", $dish["dishes"]));

            $input = array(
                'total' => $order["total"],
                "order_id" => $order["id"],
                "client_name" => $order["client_name"],
                "dishes" => $order->getDishes,
            );

            return view("payment", compact("token", "total"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
