<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })
            ->paginate(6);
        return view('pages.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['image']) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('product'), $filename);

            $data['image'] = $filename;
        }

        Product::create($data);

        return redirect()->route('product.index')
            ->with(
                'success',
                'Product successfully created'
            );
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('pages.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($data['image']) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('product'), $filename);

            $data['image'] = $filename;
        }
        $product = Product::findOrFail($id);

        $product->update($data);

        return redirect()->route('product.index')
            ->with('success', 'Product updated!');;
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index');
    }
}
