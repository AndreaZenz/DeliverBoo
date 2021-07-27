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
            $restaurant->link = route("restaurants.show",  $restaurant->id);
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

        if ($name == "") {
            return $restaurants;
        }


        $restaurantsResult = [];

        foreach ($restaurants as $restaurant) {
            $restaurant->img_url = $restaurant->img_url ? asset('storage/' . $restaurant->img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';
            // $restaurant->link = route("restaurants.show", $restaurant->id);
            $result = strpos(strtolower($restaurant['name']), $name);

            if ($result !== false) {
                $restaurantsResult[] = $restaurant;
            };

            // $restaurant->link = route("admin.restaurants.show",  $restaurant->id);
        }

        return response()->json([
            "success" => true,
            "results" => $restaurantsResult,
            "name" => $name
        ]);
    }
    
}