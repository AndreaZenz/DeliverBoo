<?php

namespace App\Http\Controllers\admin\foods;

use App\Restaurant;
use App\Type;
use App\Payment;
use App\Dish;
use App\Http\Controllers\Controller;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant_id = Auth::user()->id;
        $data = [
            'dishes' => Dish::where('restaurant_id', $restaurant_id)->orderBy('name', 'asc')->get()->all(),
        ];


        return view('admin.dishes.index', $data);
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
            $storageImage = Storage::put("dish_cover", $newDishData["img_url"]);
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
        //
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
