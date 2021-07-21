<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(){
        $types = Type::all();

        return view('admin.restaurants.create')
    };
}
