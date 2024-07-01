<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{



    protected  $product;
    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $products =  $this->product::all();

        ///status boolen 

        return view('products.index', compact('products'));
    }


    public function create(Request $request)
    {
        return view('products.create');
    }


    public function store(ProductRequest $request)
    {
        // ProductRequest



        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            $this->product::create($validatedData);
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product saved successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->route('products.index')->with('error', $ex->getMessage());
        }






        // if (!$request->has('id')) {
        //     $existingProduct = Product::where('name', $request->name)->first();
        //     if ($existingProduct) {
        //         return redirect()->back()->withErrors(['name' => 'Product already exists'])->withInput();
        //     }
        // }

        // $product = Product::updateOrCreate(
        //     ['id' => $request->id],
        //     [
        //         'name' => $request->name,
        //         'description' => $request->description,
        //         'price' => $request->price,
        //         'stock' => $request->stock,
        //     ]
        // );

        // return redirect()->route('products.index')->with('success', 'Product saved successfully!');
    }
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
        // return view('products.create', compact('product'));
    }
    public function update(ProductRequest $request, Product  $product)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            $product->update($validatedData);
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product update successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->route('products.index')->with('error', $ex->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            DB::beginTransaction();
            $product->delete();
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->route('products.index')->with('error', $ex->getMessage());
        }
    }
}
