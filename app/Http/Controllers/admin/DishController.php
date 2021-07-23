<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Type;
use App\Dish;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $dishes = Dish::all();

        return view('admin.dishes.index', [
            
            "dishes" => $dishes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        if (isset($newDishData["img_url"])) {
            $storageImage = Storage::put("dishes_cover", $newDishData["img_url"]);
            $newDishData["img_url"] = $storageImage;
        }

        return view("admin.dishes.create", compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newDishData = $request->all();

        $newDish = new Dish();

        if (array_key_exists('img_url', $newDishData)) {
            $image_path = Storage::put('restaurants_cover', $newDishData['img_url']);
            $newDishData['img_url'] = $image_path;
        }

        $newDish->fill($newDishData);


        $newDish->save();

        return redirect()->route('admin.dishes.index', $newDish->id);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $data = Dish::find($id);
            if (Auth::User()->id  == $data->User->id) {
                $dish = Auth::User()->User;
                return view('admin.dishes.index', compact('dish'));
            } else {
                $dish = Dish::where("id", $id)->with("User")->get();
                return view("admin.dishes.show", compact("dish"));
            }
        } else {
            $dish = Dish::where("id", $id)->with("User")->get();
            return view("admin.dishes.show", compact("dish"));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        // $user_id = Auth::user()->id;
        // $dish = Restaurant::find($id);


        // if ($dish && $dish->user_id == $user_id) {
            $data = [
                'dish' => $dish,
                'types' => Type::all()
            ];
            return view('admin.dishes.edit', $data);
        // }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
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

        return redirect()->route('admin.dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        // $user_id = Auth::user()->id;
        

            $dish->delete();

            return redirect()->route('admin.dishes.index');
        
        abort(404, "non è possibile eliminare il piatto selezionato");
    
    }
}
