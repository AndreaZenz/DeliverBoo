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
        $user_id = Auth::user()->id;
        $data = [
            'restaurants' => Restaurant::where('user_id', $user_id)->orderBy('name', 'asc')->get(),
            'types' => Type::All(),
        ];


        return view('admin.restaurants.index', $data);
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
        if (Auth::check()) {
            $data = Restaurant::find($id);
            if (Auth::User()->id  == $data->User->id) {
                $restaurant = Auth::User()->User;
                return view('admin.restaurants.index', compact('restaurant'));
            } else {
                $restaurant = Restaurant::where("id", $id)->with("User")->get();
                return view("admin.restaurants.show", compact("restaurant"));
            }
        } else {
            $restaurant = Restaurant::where("id", $id)->with("User")->get();
            return view("admin.restaurants.show", compact("restaurant"));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $user_id = Auth::user()->id;
        // $restaurant = Restaurant::find($id);


        if ($restaurant && $restaurant->user_id == $user_id) {
            $data = [
                'restaurant' => $restaurant,
                'types' => Type::all()
            ];
            return view('admin.restaurants.edit', $data);
        }
        abort(403, "Il ristorante selezionato non è tuo");
        // return view("admin.restaurants.edit", compact("restaurant", "types"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required | max:255',
            'categories' => 'exists:categories,id',
            'phone' => 'required|max:255',
            'cover' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:700'
        ]);

        $form_data = $request->all();
        
        if ($form_data['name'] != $restaurant->name) {
            $slug = Str::slug($form_data['name']);
            $slug_base = $slug;

            $restaurant_if_exist = Restaurant::where('slug' , $slug)->first();
            $j = 1;
            while ($restaurant_if_exist) {
                $slug = $slug_base .'-'.$j;
                $j++;
                $restaurant_if_exist = Restaurant::where('slug' , $slug)->first();

            }
            $form_data['slug'] = $slug;
        }

        if (array_key_exists('cover' , $form_data)) {
            $image_path = Storage::put('cover_shop' , $form_data['cover']);
            $form_data['cover'] = $image_path;
        }

        $restaurant->update($form_data);
        if(array_key_exists('categories', $form_data)) {
            $restaurant->categories()->sync($form_data['categories']);
        }
        return redirect()->route('admin.restaurants.index');

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
