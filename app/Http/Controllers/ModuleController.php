<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $filename = 'module-' . time() . '.' . $request->icon->extension();
            $iconPath = $request->file('icon')->storeAs('public/module', $filename);
            Storage::url($iconPath);
            $data['icon'] = $filename;
        }

        Module::create($data);

        return redirect()->route('module.index')
            ->with(
                'success',
                'Module successfully created'
            );
    }

    public function edit($id)
    {
        $module = Module::findOrFail($id);
        $brands = Brand::all();
        return view('pages.module.edit', compact('module', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('icon')) {
            $filename = 'module-' . time() . '.' . $request->icon->extension();
            $iconPath = $request->file('icon')->storeAs('public/module', $filename);
            Storage::url($iconPath);
            $data['icon'] = $filename;
        }
        $module = Module::findOrFail($id);

        $module->update($data);

        return
            redirect()->route('module.index')
            ->with('success', 'Brand updated!');
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('module.index');
    }
}
