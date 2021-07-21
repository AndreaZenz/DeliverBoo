<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {

        $restaurants = [
            'restaurants' => Restaurant::All()
        ];
        
        return view('homepage', $restaurants);
    }
    
}
