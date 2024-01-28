<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(Request $request)
    {
        $modules = Module::with('brands')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(6);
        return view('pages.module.index', compact('modules'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('pages.module.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['icon']) {
            $filename = time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('module'), $filename);

            $data['icon'] = $filename;
        }

        Module::create($data);

        return redirect()->route('module.index')
            ->with(
                'success',
                'Module successfully created'
            );
    }

    // public function edit($id)
    // {
    //     $product = Product::findOrFail($id);
    //     $categories = Category::all();
    //     return view('pages.product.edit', compact('product', 'categories'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->all();
    //     if ($data['image']) {
    //         $filename = time() . '.' . $request->image->extension();
    //         $request->image->move(public_path('product'), $filename);

    //         $data['image'] = $filename;
    //     }
    //     $product = Product::findOrFail($id);

    //     $product->update($data);

    //     return redirect()->route('product.index')
    //         ->with('success', 'Product updated!');;
    // }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('module.index');
    }
}
