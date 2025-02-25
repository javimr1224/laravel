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

    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            // The name field is required
            'name' => 'required',
            // The description field is required
            'description' => 'required',
            // The price field is required and must be a numeric value
            'price' => 'required|numeric',
        ]);

        // Create a new instance of the Product model
        $products = new Product();

        // Set the name, description, and price properties of the product
        // using the data from the request
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;

        // Save the product to the database
        $products->save();

        // Redirect the user back to the index page with a success message
        // indicating that the product was created successfully
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function show(Product $product)
    {   
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));

    }

    public function update(Request $request, Product $product)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
