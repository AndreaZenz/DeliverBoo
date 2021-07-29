<?php

namespace App\Http\Controllers\Api;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Restaurant;
use Doctrine\DBAL\Query;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with("types")->get();

        foreach ($restaurants as $restaurant) {
            $restaurant->img_url = $restaurant->img_url ? asset('storage/' . $restaurant->img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';
            $restaurant->link = route("restaurants.show",  $restaurant->id);
        }

        return response()->json([
            "success" => true,
            "results" => $restaurants
        ]);
    }

    public function filter(Request $request)
    {
        $filters = $request->only(["name", "types"]);

        $result = Restaurant::with('types');

        foreach ($filters as $filter => $value) {
            if ($filter === "types") {
                if (!is_array($value)) {
                    $value = explode(",", $value);
                }
                
                $result->join("restaurant_type", "restaurants.id", "=", "restaurant_type.restaurant_id")
                    ->whereIn("restaurant_type.type_id", $value);
            } 
            else {
                $result->where($filter, "LIKE", "%$value%");
            }
        }
        $restaurants = $result->get();

        foreach ($restaurants as $restaurant){
            $restaurant->img_url = $restaurant->img_url ? asset('storage/' . $restaurant->img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';
            $restaurant->link = route("restaurants.show",  $restaurant->id);
        }

        return response()->json([
            "success" => true,
            "filters" => $filters,
            "query" => $result->getQuery()->toSql(),
            "results" => $restaurants
        ]);
    }

    // public function restaurantShow($id)
    // {
    //     $restaurant = Restaurant::where('id', $id)->with('Dishes')->get();
        
    //     return response()->json([
    //         "success" => true,
    //         "results" => $restaurant
    //     ]);
    // }
        
    public function restaurantShow($id)
    {
        $restaurant = Restaurant::find($id);
        if($restaurant->img_url){
            $restaurant->img_url = asset('storage/' . $restaurant->img_url);
        }else{
            $restaurant->img_url =  'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';
        }
        
        $dishes = Dish::where('restaurant_id', $id)->get();
        foreach($dishes as $dish){
            if($dish->img_url){
                $dish->img_url = asset('storage/' . $dish->img_url);
            }else{
                $dish->img_url =  'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';
            }

        }

        $data = [
            'restaurant' => $restaurant,
            'dishes' => $dishes
        ];


        return response()->json([
            "success" => true,
            "results" => $data
            
        ]);
    }

}
