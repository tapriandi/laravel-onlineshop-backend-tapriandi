<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::all();

        $data = $modules->map(function ($module) {
            return [
                'id' => $module->id,
                'name' => $module->name,
                'brand_id' => $module->module_id,
                'description' => json_decode($module->hashtag),
                'icon' => asset('module/' . $module->icon),
            ];
        })->toArray();

        if (!$modules) {
            return response()->json([
                'message' => 'Modules Not Found.'
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
        $module = Module::find($id);
        $data = [
            'id' => $module->id,
            'name' => $module->name,
            'brand_id' => $module->module_id,
            'description' => json_decode($module->hashtag),
            'icon' => asset('module/' . $module->icon),
        ];

        if (!$module) {
            return response()->json([
                'message' => 'Module Not Found.'
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
