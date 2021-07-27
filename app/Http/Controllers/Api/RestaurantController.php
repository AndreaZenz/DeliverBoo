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
            // if ($filter === "types") {
            //     if (!is_array($value)) {
            //         $value = explode(",", $value);
            //     }

            //     $result->join("restaurant_type", "restaurants.id", "=", "restaurant_type.restaurant_id")
            //         ->whereIn("restaurant_type.type_id", $value);
            // } 
            if ($filter === "types") {
                if (!is_array($value)) {
                    $value = explode(",", $value);
                }

                $result->whereIn("type_id", $value);
                //$result->whereNotNull("category_id");

            } else {
                $result->where($filter, "LIKE", "%$value%");
            }
        }
        $restaurants = $result->get();

        foreach ($restaurants as $restaurant) {
            $restaurant->img_url = $restaurant->img_url ? asset('storage/' . $restaurant->img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';
        }

        return response()->json([
            "success" => true,
            "filters" => $filters,
            "query" => $result->getQuery()->toSql(),
            "results" => $restaurants
        ]);
    }
}
