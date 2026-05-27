<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTAR PROMOCIONES ACTIVAS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $promotions = Promotion::with('business')
            ->where('active', true)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($promotions);
    }

    /*
    |--------------------------------------------------------------------------
    | MOSTRAR PROMOCIÓN
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $promotion = Promotion::with('business')
            ->findOrFail($id);

        return response()->json($promotion);
    }

    /*
    |--------------------------------------------------------------------------
    | PROMOCIONES DE UN NEGOCIO
    |--------------------------------------------------------------------------
    */

    public function businessPromotions($businessId)
    {
        $promotions = Promotion::where('business_id', $businessId)
            ->where('active', true)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($promotions);
    }

    /*
    |--------------------------------------------------------------------------
    | CREAR PROMOCIÓN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'title' => 'required|string|max:255',
        ]);

        $promotion = Promotion::create([

            'business_id' => $request->business_id,

            'title' => $request->title,

            'description' => $request->description,

            'image' => $request->image,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'active' => $request->active ?? true,
        ]);

        return response()->json([
            'message' => 'Promoción creada correctamente',
            'promotion' => $promotion
        ], 201);
    }

    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR PROMOCIÓN
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);

        $promotion->update([

            'title' => $request->title ?? $promotion->title,

            'description' => $request->description ?? $promotion->description,

            'image' => $request->image ?? $promotion->image,

            'start_date' => $request->start_date ?? $promotion->start_date,

            'end_date' => $request->end_date ?? $promotion->end_date,

            'active' => $request->active ?? $promotion->active,
        ]);

        return response()->json([
            'message' => 'Promoción actualizada',
            'promotion' => $promotion
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | ELIMINAR PROMOCIÓN
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);

        $promotion->delete();

        return response()->json([
            'message' => 'Promoción eliminada'
        ]);
    }
}