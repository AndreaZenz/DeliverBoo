<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use App\Type;
use App\Http\Controllers\Controller;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RestaurantsController extends Controller
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

        
        return view('admin.home_login', $restaurants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        
        return view("admin.restaurants.create", compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newRestaurantData = $request->all();
        $newRestaurant = new Restaurant();
        $newRestaurant->fill($newRestaurantData);
        $newRestaurant->User()->associate(Auth::User()->id);
        $newRestaurant->save();

        return redirect()->route('admin.restaurants.index', $newRestaurant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);

        return view('admin.restaurants.show', [
            "restaurant" => $restaurant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        $types = Type::all();

        return view("admin.restaurants.edit", compact("restaurant", "types"));
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
        
        // prenderà l'elemento specifico di quell'id
        $restaurant = Restaurant::findOrFail($id);

        $formData = $request->all(); 
        // il $request ci permette di accedere ai dati inseriti tramite il form
        
        $restaurant->update($formData); 
        // assegnerà a quello specifico elemento i dati appena ricevuti

        return redirect()->route("admin.restaurants.show", $restaurant->id); 
        // (con 'show' indirizziamo l'utente alla visualizzazione dei risultati, ma siamo liberi di mandarlo dove vogliamo)
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
