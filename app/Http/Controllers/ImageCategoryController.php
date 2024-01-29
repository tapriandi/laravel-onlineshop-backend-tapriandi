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

    public function edit($id)
    {
        $imageCategory = ImageCategory::findOrFail($id);
        $images = Image::all();
        return view('pages.image-category.edit', compact('imageCategory', 'images'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('icon')) {
            $filename = time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('imageCategory'), $filename);

            $data['icon'] = $filename;
        }

        $hashtags = explode(',', $request->input('hashtag'));
        $hashtags = array_map('trim', $hashtags);
        $data['hashtag'] = json_encode($hashtags);

        $image = ImageCategory::findOrFail($id);

        $image->update($data);

        return
            redirect()->route('image-category.index')
            ->with('success', 'Image category updated!');
    }

    public function destroy($id)
    {
        $module = ImageCategory::findOrFail($id);
        $module->delete();

        return redirect()->route('image-category.index');
    }
}
