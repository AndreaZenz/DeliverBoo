<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index() {
        return response()->json([
            "success" => true,
            "results" => Type::all()
        ]);
    }
}
