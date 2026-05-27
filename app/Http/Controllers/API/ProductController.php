<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function businessProducts(int $businessId)
    {
        $products = Product::with('categories')
            ->where('business_id', $businessId)
            ->where('available', true)
            ->get();

        return response()->json($products);
    }

    public function show(int $id)
    {
        $product = Product::with([
            'business',
            'categories'
        ])->findOrFail($id);

        return response()->json($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'business_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = Product::create([
            'business_id' => $request->business_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
            'available' => $request->available ?? true,
            'featured' => $request->featured ?? false,
        ]);

        if ($request->categories) {
            $product->categories()->sync($request->categories);
        }

        return response()->json([
            'message' => 'Producto creado',
            'product' => $product
        ]);
    }

    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        if ($request->categories) {
            $product->categories()->sync($request->categories);
        }

        return response()->json([
            'message' => 'Producto actualizado',
            'product' => $product
        ]);
    }

    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'message' => 'Producto eliminado'
        ]);
    }
}