<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::with('categories')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(6);
        return view('pages.brand.index', compact('brands'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.brand.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $userId = Auth::id();

        $data = $request->all();
        $data['user_id'] = $userId;

        $brand = Brand::create($data);

        if (isset($data['category_id']) && is_array($data['category_id'])) {
            $brand->categories()->sync($data['category_id']); // Base table or view not found: 1146 Table 'laravel-onlineshop.brand_category' doesn't exist
        }

        return
            redirect()->route('brand.index')
            ->with(
                'success',
                'Brand successfully created'
            );
    }

    // public function edit($id)
    // {
    //     $brand = Brand::findOrFail($id);
    //     return view('pages.brand.edit', compact('brand'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->all();
    //     $brand = brand::findOrFail($id);
    //     $brand->update($data);
    //     return redirect()->route('brand.index');
    // }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brand.index')
            ->with(
                'success',
                'Deleted successfully'
            );
    }
}
