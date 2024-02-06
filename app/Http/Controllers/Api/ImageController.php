<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $images = Image::all();

        $data = $images->map(function ($image) {
            return [
                'id' => $image->id,
                'name' => $image->name,
                'module_id' => $image->module_id,
                'caption' => $image->caption,
                'hashtag' => json_decode($image->hashtag),
                'url' => json_decode($image->url),
            ];
        })->toArray();

        if (!$images) {
            return response()->json([
                'message' => 'Images Not Found.'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $image = Image::find($id);
        $data = [
            'id' => $image->id,
            'name' => $image->name,
            'module_id' => $image->module_id,
            'caption' => $image->caption,
            'hashtag' => json_decode($image->hashtag),
            'url' => json_decode($image->url),
        ];

        if (!$image) {
            return response()->json([
                'message' => 'Image Not Found.'
            ], 404);
        }
        // Return Json Response
        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $data
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
