<?php

namespace App\Http\Controllers\Api;

use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();

        foreach ($dishes as $dish) {
            $dish->img_url = $dish->img_url ? asset('storage/' . $dish->img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';
        }

        return response()->json([
            "success" => true,
            "results" => $dishes
        ]);
    }
}
