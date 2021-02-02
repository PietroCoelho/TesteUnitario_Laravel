<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class ProductController extends Controller
{
    //
    public function store(Request $request)
    {
        try {
            $Product = Product::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'price' => $request->price
            ]);

            // dd($Product);
            return response()->json(['data' => new ProductResource($Product)], 201);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function show(int $id)
    {
        $Product = Product::findOrfail($id);
        return response()->json(['data' => new ProductResource($Product)]);
    }

    public function update(Request $request, int $id)
    {
        $Product = Product::findOrfail($id);

        dd($Product);
    }
}
