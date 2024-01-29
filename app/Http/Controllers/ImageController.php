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

            Image::create($data);
            return redirect()->route('image.index')
                ->with(
                    'success',
                    'Image successfully created'
                );
        }
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
        if ($request->hasFile('url')) {
            $filename = time() . '.' . $request->url->extension();
            $request->url->move(public_path('image'), $filename);

            $data['url'] = $filename;
        }

        $hashtags = explode(',', $request->input('hashtag'));
        $hashtags = array_map('trim', $hashtags);
        $data['hashtag'] = json_encode($hashtags);

        $image = Image::findOrFail($id);

        $image->update($data);

        return
            redirect()->route('image.index')
            ->with('success', 'Image updated!');
    }

    public function destroy($id)
    {
        $module = Image::findOrFail($id);
        $module->delete();

        return redirect()->route('image.index');
    }
}
