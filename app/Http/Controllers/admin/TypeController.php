<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(){
        $types = Type::all();

        return view("admin.types.index",  ["types" => $types]);
    }
}
