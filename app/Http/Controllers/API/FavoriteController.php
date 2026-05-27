<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with('business')
            ->where('user_id', Auth::user()->id)
            ->get();

        return response()->json($favorites);
    }

    public function store(Request $request)
    {
        $favorite = Favorite::firstOrCreate([
            'user_id' => Auth::user()->id,
            'business_id' => $request->business_id,
        ]);

        return response()->json([
            'message' => 'Favorito agregado',
            'favorite' => $favorite
        ]);
    }

    public function destroy(int $businessId)
    {
        Favorite::where('user_id', Auth::user()->id)
            ->where('business_id', $businessId)
            ->delete();

        return response()->json([
            'message' => 'Favorito eliminado'
        ]);
    }
}