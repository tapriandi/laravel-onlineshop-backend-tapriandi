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

        $imageUrls = [];
        if ($request->hasFile('url')) {
            foreach ($request->file('url') as $image) {
                $filename = time() . '.' . $image->getClientOriginalName();
                $image->move(public_path('image'), $filename);
                $imageUrls[] = $filename;
            }
        }

        $data['url'] = json_encode($imageUrls);

        $hashtags = explode(',', $request->input('hashtag'));
        $hashtags = array_map('trim', $hashtags);
        $data['hashtag'] = json_encode($hashtags);

        Image::create($data);
        return redirect()->route('image.index')
            ->with(
                'success',
                'Image successfully created'
            );
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        $modules = Module::all();
        return view('pages.image.edit', compact('image', 'modules'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $image = Image::findOrFail($id);

        $imageUrls = [];
        if ($request->hasFile('url2')) {
            foreach ($request->file('url2') as $image) {
                $filename = time() . '.' . $image->getClientOriginalName();
                $image->move(public_path('image'), $filename);
                $imageUrls[] = $filename;
            }
        }

        $newImages = [];
        if (!($data['url'][0] == 1) && $request->hasFile('url2')) {
            $newImages = array_merge($imageUrls, $data['url']);
        } elseif (!($data['url'][0] == 1)) {
            $newImages = $data['url'];
        } elseif ($request->hasFile('url2')) {
            $newImages = $imageUrls;
        }

        $hashtags = explode(',', $request->input('hashtag'));
        $hashtags = array_map('trim', $hashtags);
        $data['hashtag'] = json_encode($hashtags);

        $newImages = \array_diff($newImages, ["1"]);
        $data['url'] = json_encode($newImages);

        $image = Image::findOrFail($id);
        $image->update($data);

        return redirect()->route('image.index')
            ->with('success', 'Image updated');
    }

    public function destroy($id)
    {
        $module = Image::findOrFail($id);
        $module->delete();

        return redirect()->route('image.index');
    }
}
