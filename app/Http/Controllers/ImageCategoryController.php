<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\ImageCategory;
use Illuminate\Http\Request;

class ImageCategoryController extends Controller
{
    public function index(Request $request)
    {
        $imageCategory = ImageCategory::with('images')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(6);
        return view('pages.image-category.index', compact('imageCategory'));
    }

    public function create()
    {
        $images = Image::all();
        return view('pages.image-category.create', compact('images'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $hashtags = explode(',', $request->input('hashtag'));
        $hashtags = array_map('trim', $hashtags);
        $data['hashtag'] = json_encode($hashtags);

        if ($data['icon']) {
            $filename = time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('imageCategory'), $filename);

            $data['icon'] = $filename;
        }

        ImageCategory::create($data);

        return redirect()->route('image-category.index')
            ->with(
                'success',
                'Image Category successfully created'
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
        $module = ImageCategory::findOrFail($id);
        $module->delete();

        return redirect()->route('image-category.index');
    }
}
