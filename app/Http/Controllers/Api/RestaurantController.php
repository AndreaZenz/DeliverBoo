<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Doctrine\DBAL\Query;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            $restaurant->img_url = $restaurant->img_url ? asset('storage/' . $restaurant->img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';
        }

        return response()->json([
            "success" => true,
            "results" => $restaurants
        ]);
    }

    public function filter()
    {
        $restaurants = Restaurant::all();

        $name = isset($_GET['name']) ? strtolower($_GET['name']) : "";
        $address = isset($_GET['address']) ? strtolower($_GET['address']) : "";

        if ($name == "" ){
            return $restaurants;
        }


        $restaurantsResult = [];

        foreach ($restaurants as $restaurant) {
            $restaurant->img_url = $restaurant->img_url ? asset('storage/' . $restaurant->img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';

            $result = strpos(strtolower($restaurant['name']), $name);

            if ($result !== false) {
                $restaurantsResult[] = $restaurant;
            };
        }

        return response()->json([
            "success" => true,
            "results" => $restaurantsResult,
            "name" => $name
        ]);
    }
    //     // $filters = $request->only(["name", "address", "img_url"]);

    //     $name = isset($_GET['name']) ? strtolower($_GET['name']) : "";
    //     $address_filters = isset($_GET['address']) ? strtolower($_GET['address']) : "";


    //     $restaurants = Restaurant::all();

    //     $restaurantFiltered = [];
    //     foreach ($restaurants as $restaurant) {

    //         $result = strpos(strtolower($restaurant['name']), $name);

    //         if ($result !== false) {
    //             $array_filtered[] = $restaurant;
    //         };
    //         // $restaurant->img_url = $restaurant->img_url ? asset('storage/' . $restaurant->img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';

    //         // $restaurant = Restaurant::whereIn("name", $value);
    //         // $restaurants->where($restaurant, "LIKE", "%$value%");
    //         return $restaurantFiltered;
    //     }

    //     // foreach ($restaurants as $restaurant) {
    //     //     $result = strpos(strtolower($restaurant['genre']), $address_filters);

    //     //     if ($result !== false) {
    //     //         $array_filtered[] = $restaurant;
    //     //     };
    //     // }



    //     return response()->json([
    //         "success" => true,
    //         "filters" => $name,
    //         "query" => $restaurants->getQuery()->toSql(),
    //         "results" => $restaurantFiltered
    //     ]);
    // }
}
