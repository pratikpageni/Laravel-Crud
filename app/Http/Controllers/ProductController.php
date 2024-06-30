<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }


    public function create(Request $request)
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => '',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        if (!$request->has('id')) {
            $existingProduct = Product::where('name', $request->name)->first();
            if ($existingProduct) {
                return redirect()->back()->withErrors(['name' => 'Product already exists'])->withInput();
            }
        }

        $product = Product::updateOrCreate(
            ['name' => $request->name],
            [
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
            ]
        );

        return redirect()->route('products.index')->with('success', 'Product saved successfully!');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);

        return view('products.create', compact('product'));
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        dd(1);
        $product = Product::findOrFail($id);

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
