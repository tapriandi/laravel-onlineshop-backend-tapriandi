<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Brand::with('categories');

        try {
            $brands = $query->get(); // Get brands before mapping

            $data = $brands->map(function ($brand) {
                return [
                    'id' => $brand->id,
                    'country' => 'Indonesia',
                    'name' => $brand->name,
                    'slug' => $brand->name,
                    'banner' => asset('brand/' . $brand->banner),
                    'icon' => asset('brand/' . $brand->icon),
                    'categories' => $brand->categories->map(function ($category) {
                        return [
                            'id' => $category->id,
                            'name' => $category->name,
                        ];
                    })->toArray(),
                ];
            })->toArray();

            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
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
        // Post Detail
        $brand = Brand::find($id);
        $data = [
            'id' => $brand->id,
            'country' => 'Indonesia',
            'name' => $brand->name,
            'slug' => $brand->name,
            'banner' => asset('brand/' . $brand->banner),
            'icon' => asset('brand/' . $brand->icon),
            'categories' => $brand->categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                ];
            })->toArray(),
        ];

        if (!$brand) {
            return response()->json([
                'message' => 'Brand Not Found.'
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
