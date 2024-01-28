<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = DB::table('brands')
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
        Brand::create($data);
        return redirect()->route('brand.index')
            ->with(
                'success',
                'Brand successfully created'
            );
    }

    // public function edit($id)
    // {
    //     $category = Category::findOrFail($id);
    //     return view('pages.category.edit', compact('category'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->all();
    //     $category = Category::findOrFail($id);
    //     $category->update($data);
    //     return redirect()->route('category.index');
    // }

    // public function destroy($id)
    // {
    //     $category = Category::findOrFail($id);
    //     $category->delete();
    //     return redirect()->route('category.index');
    // }
}
