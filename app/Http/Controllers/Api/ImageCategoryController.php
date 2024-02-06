<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ImageCategory;
use Illuminate\Http\Request;

class ImageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imageCategory = ImageCategory::all();

        $data = $imageCategory->map(function ($image) {
            return [
                'id' => $image->id,
                'name' => $image->name,
                'image_id' => $image->image_id,
                'hashtag' => json_decode($image->hashtag),
                'icon' => asset('imageCategory/' . $image->icon),
            ];
        })->toArray();

        if (!$imageCategory) {
            return response()->json([
                'message' => 'Image Categories Not Found.'
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
        $image = ImageCategory::find($id);

        $data = [
            'id' => $image->id,
            'name' => $image->name,
            'image_id' => $image->image_id,
            'hashtag' => json_decode($image->hashtag),
            'icon' => asset('imageCategory/' . $image->icon),
        ];

        if (!$image) {
            return response()->json([
                'message' => 'Image Category Not Found.'
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
