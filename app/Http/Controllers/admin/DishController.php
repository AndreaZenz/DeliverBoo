<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Type;
use App\Dish;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($restaurant_id)
    {
        $dishes = Dish::where('restaurants_id', $restaurant_id)->get();
        return view('admin.dishes.index', compact('dishes'));
    }
    /* per registrare un piatto ad un ristorante noi ci riferiamo all'user id: Ora il problema qual'è che quando andiamo a filtrare i piatti tutti i ristoranti utilizzano lo stesso restaurant_id che a sua volta corrisponde all'user_id 
    e di conseguenza non possiamo specificare il ristorante strettamente al ristorante perché il ristorante non ha un id specifico??
    Oppure dobbiamo collegarlo con l'id singolo del ristorante, son 2 ore che ci provo con questa query 
        $dishes = Auth::user()->id;
    ma non riesco a capire dovrei avere per esempio un
        $disesh = Dish::restaurant_id
    solo che ovviamente questa non funziona perché quello che fa Auth lo fa perché è stato scritto nei meandri di laravel?
    non ne ho idea
    /*

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($restaurant_id)
    {
        $types = Type::all();

        if (isset($newDishData["img_url"])) {
            $storageImage = Storage::put("dishes_cover", $newDishData["img_url"]);
            $newDishData["img_url"] = $storageImage;
        }

        return view("admin.dishes.create", compact("restaurant_id", "types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($restaurant_id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:8|regex:/^-?[0-9]+(?:.[0-9]{1,2})?$/',
            'description' => 'required',
            'ingredient_list' => 'required',
            'img_url' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:700'
        ]);

        $newDishData = $request->all();

        // $newDish = new Dish();

        if (array_key_exists('img_url', $newDishData)) {
            $image_path = Storage::put('restaurants_cover', $newDishData['img_url']);
            $newDishData['img_url'] = $image_path;
        }

        // $restaurant = Restaurant::findOrFail($restaurant_id);
        // $restaurant->dishes()->create($request->all());


        // $newDish->fill($newDishData);

        // $newDish->restaurants_id = Auth::user()->id;

        // $newDish->save();

        Dish::create($newDishData + ['restaurants_id' => $restaurant_id]);

        //return redirect()->route('admin.dishes.index', $newDish->id);
        return redirect()->route('admin.restaurants.dishes.index', $restaurant_id);
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($restaurant_id, Dish $dish)
    {
        return view('admin.dishes.show', compact('restaurants_id', 'dish'));
        // if (Auth::check()) {
        //     $data = Dish::find($id);
        //     if (Auth::User()->id  == $data->User->id) {
        //         $dish = Auth::User()->User;
        //         return view('admin.dishes.index', compact('dish'));
        //     } else {
        //         $dish = Dish::where("id", $id)->with("User")->get();
        //         return view("admin.dishes.show", compact("dish"));
        //     }
        // } else {
        //     $dish = Dish::where("id", $id)->with("User")->get();
        //     return view("admin.dishes.show", compact("dish"));
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($restaurants_id, Dish $dish)
    {
        $types = Type::all();

        return view('admin.dishes.edit', compact('restaurants_id', 'dish', 'types'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($restaurant_id, Request $request, Dish $dish)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:8|regex:/^-?[0-9]+(?:.[0-9]{1,2})?$/',
            'description' => 'required',
            'ingredient_list' => 'required',
            'img_url' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:700'
        ]);

        $form_data = $request->all();

        if (array_key_exists('img_url', $form_data)) {

            if ($dish->img_url) {
                Storage::delete($dish->img_url);
            }

            $image_path = Storage::put('dish_cover', $form_data['img_url']);

            $form_data['img_url'] = $image_path;
        }

        $dish->update($form_data);

        return redirect()->route('admin.restaurants.dishes.index', $restaurant_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($restaurant_id, Dish $dish)
    {
        // $user_id = Auth::user()->id;


        $dish->delete();

        return redirect()->route('admin.restaurants.dishes.index', $restaurant_id);

        abort(404, "non è possibile eliminare il piatto selezionato");
    }
}
