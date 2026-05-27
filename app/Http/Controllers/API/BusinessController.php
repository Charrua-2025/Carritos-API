<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Http\Resources\BusinessResource;

class BusinessController extends Controller
{
    public function index()
    {
        $businesses = Business::with([
            'category',
            'location',
            'products'
        ])
        ->where('active', true)
        ->get();

        return BusinessResource::collection($businesses);
    }

    public function show(int $id)
    {
        $business = Business::with([
            'category',
            'location',
            'products',
            'promotions'
        ])->findOrFail($id);

        $business->increment('views_count');

        return new BusinessResource($business);
    }

    public function featured()
    {
        $businesses = Business::with([
            'category',
            'location',
            'products'
        ])
        ->where('featured', true)
        ->where('active', true)
        ->get();

        return BusinessResource::collection($businesses);
    }

    public function byCategory(int $categoryId)
    {
        $businesses = Business::with([
            'category',
            'location',
            'products'
        ])
        ->where('category_id', $categoryId)
        ->where('active', true)
        ->get();

        return BusinessResource::collection($businesses);
    }

    public function byLocation(string $locationId)
    {
        $businesses = Business::with([
            'category',
            'location',
            'products'
        ])
        ->where('location_id', $locationId)
        ->where('active', true)
        ->get();

        return BusinessResource::collection($businesses);
    }

    public function search(Request $request)
    {
        $query = $request->search;

        $businesses = Business::with([
            'category',
            'location',
            'products'
        ])
        ->where(function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
              ->orWhere('description', 'LIKE', "%{$query}%");
        })
        ->where('active', true)
        ->get();

        return BusinessResource::collection($businesses);
    }

    public function nearby(Request $request)
    {
        $latitude = $request->lat;
        $longitude = $request->lng;

        $radius = $request->radius ?? 5;

        $businesses = Business::selectRaw("
                *,
                (
                    6371 * acos(
                        cos(radians(?))
                        * cos(radians(latitude))
                        * cos(radians(longitude) - radians(?))
                        + sin(radians(?))
                        * sin(radians(latitude))
                    )
                ) AS distance
            ", [
                $latitude,
                $longitude,
                $latitude
            ])
            ->with([
                'category',
                'location',
                'products'
            ])
            ->where('active', true)
            ->having('distance', '<=', $radius)
            ->orderBy('distance')
            ->get();

        return BusinessResource::collection($businesses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $business = Business::create([
            'user_id' => auth()->user->id,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'whatsapp' => $request->whatsapp,
            'phone' => $request->phone,
            'delivery_available' => $request->delivery_available ?? false,
            'pickup_available' => $request->pickup_available ?? true,
            'opening_time' => $request->opening_time,
            'closing_time' => $request->closing_time,
        ]);

        return response()->json([
            'message' => 'Negocio creado',
            'business' => $business
        ]);
    }

    public function update(Request $request, int $id)
    {
        $business = Business::findOrFail($id);

        $business->update($request->all());

        return response()->json([
            'message' => 'Negocio actualizado',
            'business' => $business
        ]);
    }

    public function destroy(int $id)
    {
        $business = Business::findOrFail($id);

        $business->delete();

        return response()->json([
            'message' => 'Negocio eliminado'
        ]);
    }
}