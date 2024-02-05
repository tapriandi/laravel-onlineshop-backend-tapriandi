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

        $filterCategories = $request->input('filter', ''); // Handle missing filter
        $query = Brand::with('categories');

        if ($filterCategories) {
            try {
                // Validate and cast filter categories to integers
                $filterCategories = array_map('intval', explode(',', $filterCategories));

                $query->whereHas('categories', function ($categoryQuery) use ($filterCategories) {
                    $categoryQuery->whereIn('id', 1);
                });
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Invalid filter parameter',
                ], 400);
            }
        }

        try {
            $brands = $query->get(); // Get brands before mapping

            $data = $brands->map(function ($brand) {
                return [
                    'id' => $brand->id,
                    'icon' => $brand->icon,
                    'name' => $brand->name,
                    'slug' => $brand->name,
                    'country' => 'Indonesia',
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
            \Log::error($e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Internal Server Error',
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
        //
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
