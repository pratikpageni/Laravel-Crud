<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
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

    public function index(Request $request)
{
    $price=null;
    $categoryId=null;
        $products = $this->product->all();
        $categories = Category::all()->pluck('name', 'id');

        return view('products.index', compact('products', 'categories','price','categoryId'));
    }



    public function getProductsByPriceAndCategory(Request $request)
    {
       
        
        if ($request->has('price')) {
            $price = $request->input('price');
        }
        if ($request->has('category_id')) {
            $categoryId = $request->input('category_id');
        }

        $products = Product::where('price', '>', $price)
            ->where('id', $categoryId)
            ->get();
        $categories = Category::all()->pluck('name', 'id');

        return view('products.index', compact('products', 'categories','price','categoryId'));
    }

    public function create(Request $request)
    {
        return view('products.create');
    }


    public function store(ProductRequest $request)
    {
        // ProductRequest
        // dd($request->all());


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
