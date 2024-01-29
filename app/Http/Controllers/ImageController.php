<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Module;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        $images = Image::with('modules')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(6);
        return view('pages.image.index', compact('images'));
    }

    public function create()
    {
        $modules = Module::all();
        return view('pages.image.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $hashtags = explode(',', $request->input('hashtag'));
        $hashtags = array_map('trim', $hashtags);
        $data['hashtag'] = json_encode($hashtags);

        if ($data['url']) {
            $filename = time() . '.' . $request->url->extension();
            $request->url->move(public_path('image'), $filename);

            $data['url'] = $filename;
        }
        // multiple
        // if ($request->hasFile('url')) {
        //     // Access the array of uploaded images:
        //     $images = $request->file('url');

        //     foreach ($images as $image) {
        //         // Generate a unique filename for each image:
        //         $filename = time() . '.' . $image->extension();

        //         // Move the image to the desired storage path:
        //         $image->move(public_path('image'), $filename);

        //         // Store the filename(s) in the data array (adjust based on your model structure):
        //         $data['url'][] = $filename; // Assuming you want to store multiple URLs
        //     }
        // }

        Image::create($data);

        return redirect()->route('image.index')
            ->with(
                'success',
                'Image successfully created'
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
        $module = Image::findOrFail($id);
        $module->delete();

        return redirect()->route('image.index');
    }
}
