<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Restaurant;
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

    public function filter(Request $request)
    {
        $filters = $request->only(["name", "address", "img_url"]);

        $restaurants = Restaurant::with(["name", "address"]);
        
        foreach ($restaurants as $restaurant => $value) {
            $restaurant->img_url = $restaurant->img_url ? asset('storage/' . $restaurant->img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';

            $restaurant = Restaurant::whereIn("name", $value);
        }
        
        return response()->json([
            "success" => true,
            "filters" => $filters,
            "query" => $restaurants->getQuery()->toSql(),
            "results" => $restaurants
        ]);
    }
}
