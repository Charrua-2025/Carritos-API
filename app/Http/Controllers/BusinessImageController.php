<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessImage;

class BusinessImageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTAR IMÁGENES DE NEGOCIO
    |--------------------------------------------------------------------------
    */

    public function index(int $businessId)
    {
        $images = BusinessImage::where('business_id', $businessId)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($images);
    }

    /*
    |--------------------------------------------------------------------------
    | MOSTRAR IMAGEN
    |--------------------------------------------------------------------------
    */

    public function show(int $id)
    {
        $image = BusinessImage::with('business')
            ->findOrFail($id);

        return response()->json($image);
    }

    /*
    |--------------------------------------------------------------------------
    | CREAR IMAGEN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'image' => 'required|string'
        ]);

        $image = BusinessImage::create([

            'business_id' => $request->business_id,

            'image' => $request->image
        ]);

        return response()->json([
            'message' => 'Imagen agregada correctamente',
            'image' => $image
        ], 201);
    }

    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR IMAGEN
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $image = BusinessImage::findOrFail($id);

        $image->update([
            'image' => $request->image ?? $image->image
        ]);

        return response()->json([
            'message' => 'Imagen actualizada',
            'image' => $image
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | ELIMINAR IMAGEN
    |--------------------------------------------------------------------------
    */

    public function destroy(int $id)
    {
        $image = BusinessImage::findOrFail($id);

        $image->delete();

        return response()->json([
            'message' => 'Imagen eliminada'
        ]);
    }
}