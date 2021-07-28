<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Type;
use App\Dish;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $dishes = Dish::where('restaurant_id', $restaurant_id)->get();
        return view('dishes.index', compact('dishes'));
    }

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

        return view("dishes.create", compact("restaurant_id", "types"));
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

        $newDish = new Dish();

        if (array_key_exists('img_url', $newDishData)) {
            $image_path = Storage::put('restaurants_cover', $newDishData['img_url']);
            $newDishData['img_url'] = $image_path;
        }

        // $restaurant = Restaurant::findOrFail($restaurant_id);
        // $restaurant->dishes()->create($request->all());


        $newDish->fill($newDishData);

        $newDish->restaurant_id = $restaurant_id;

        $newDish->save();

        // Dish::create($newDishData + ['restaurant_id' => $restaurant_id]);

        //return redirect()->route('dishes.index', $newDish->id);
        return redirect()->route('restaurants.show', $restaurant_id);

    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($restaurant_id, Dish $dish)
    {
        return view('dishes.show', compact('restaurant_id', 'dish'));
        // if (Auth::check()) {
        //     $data = Dish::find($id);
        //     if (Auth::User()->id  == $data->User->id) {
        //         $dish = Auth::User()->User;
        //         return view('dishes.index', compact('dish'));
        //     } else {
        //         $dish = Dish::where("id", $id)->with("User")->get();
        //         return view("dishes.show", compact("dish"));
        //     }
        // } else {
        //     $dish = Dish::where("id", $id)->with("User")->get();
        //     return view("dishes.show", compact("dish"));
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit2($restaurant_id, Dish $dish)
    {
        $types = Type::all();

        return view('dishes.edit', compact('restaurant_id', 'dish', 'types'));

    }

    public function edit($restaurant_id, Dish $dish)
    {
        $data = [
            'restaurant_id' => $restaurant_id,
            'dish' => $dish,
            'types' => Type::all()
        ];

        return view('dishes.edit', $data);

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

        return redirect()->route('restaurants.show', $restaurant_id);

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

        // $dish->restaurants()->detach();

        $dish->delete();

        return redirect()->route('restaurants.show', $restaurant_id);

        abort(404, "non è possibile eliminare il piatto selezionato");
    }
}