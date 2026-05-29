<?php

namespace App\Http\Controllers;

use App\Models\ImageApp;

class ImageAppController extends Controller
{
    public function index()
    {
        $images = ImageApp::orderBy('id', 'desc')->get();

        $data = $images->map(function ($img) {

            return [
                'id' => $img->id,
                'name' => $img->name,
                'url' => env('APP_URL') . '/storage/images/' . $img->name
            ];
        });

        return response()->json($data);
    }
}