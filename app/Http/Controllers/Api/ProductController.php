<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    //
    public function store(Request $request)
    {
        try{
        $Product = Product::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'price' => $request->price
        ]);

        return response()->json(['data' => $Product ], 201);
    }catch(Exception $e){
        return response()->json(['message' => $e->getMessage()], 400);
    }
    }
}
