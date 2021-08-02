<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use App\Type;
use App\Payment;
use App\Dish;
use App\Http\Controllers\Controller;
use Exception;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
            'types' => Type::where(''),
        ];

        //if($user_id == $data->restaurants->id)
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

        if (isset($newRestaurantData["img_url"])) {
            $storageImage = Storage::put("restaurants_cover", $newRestaurantData["img_url"]);
            $newRestaurantData["img_url"] = $storageImage;
        }

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

        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required | max:255',
            'img_url' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:700'
        ]);

        $newRestaurantData = $request->all();

        $newRestaurant = new Restaurant();

        if (array_key_exists('img_url', $newRestaurantData)) {
            $image_path = Storage::put('restaurants_cover', $newRestaurantData['img_url']);
            $newRestaurantData['img_url'] = $image_path;
        }

        $newRestaurant->fill($newRestaurantData);

        $newRestaurant->user_id = Auth::user()->id;

        $newRestaurant->save();

        // $newRestaurant->type()->attach($newRestaurant["types"]);

        if (isset($newRestaurantData['types'])) {
            $newRestaurant->types()->sync($newRestaurantData['types']);
        }

        return redirect()->route('admin.restaurants.index', $newRestaurant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $user_id = Auth::user()->id;
        if ($user_id === $restaurant->user_id) {
            $dishes = Dish::where('restaurant_id', $restaurant->id)->get();

            return view('admin.restaurants.show', [
                'restaurant' => $restaurant,
                'dishes' => $dishes
            ]);
        } else {
            abort(401);
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
                'types' => Type::all(),
                'dishes' => Dish::all()
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
            'img_url' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:700',
            'types' => "exists:types,id"
        ]);

        $form_data = $request->all();

        if (array_key_exists('img_url', $form_data)) {

            if ($restaurant->img_url) {
                Storage::delete($restaurant->img_url);
            }

            $image_path = Storage::put('restaurants_cover', $form_data['img_url']);

            $form_data['img_url'] = $image_path;
        }

        if (!key_exists("types", $form_data)) {
            $form_data["types"] = [];
        }

        // $restaurant->Type()->detach();
        // $restaurant->Type()->attach($form_data["types"]);

        try {
            $restaurant->types()->sync($form_data["types"]);
        } catch (Exception $er) {
            abort(400, "Type inesistente");
        }

        $restaurant->update($form_data);

        return redirect()->route('admin.restaurants.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant, Dish $Dishes)
    {
        $user_id = Auth::user()->id;



        if ($restaurant && $restaurant->user_id == $user_id) {

            $restaurant->dishes()->delete();
            $restaurant->delete();

            return redirect()->route('admin.restaurants.index');
        }
        abort(404, "non è possibile eliminare il ristorante selezionato");
    }
    public function filter(Request $request)
    {
        $filters = $request->all();
        $restaurants = Restaurant::join("restaurant_type", "restaurants.id", "=", "restaurant_type.restaurant_id")
            ->where("restaurant_type.type_id", $filters["type"])->get();

        return redirect()->route("admin.restaurants.index")->with(["restaurants" => $restaurants]);
    }
}
