<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return Inertia::render(
            'Products/Index',
            [
                'products' => $products
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return Inertia::render(
            'Products/Create',
            [
                'users' => $users
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'user_id' => 'required|exists:users,id', // Ensure user_id exists in the users table
        ]);

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => $request->user_id,
        ]);

        sleep(1);

        return redirect()->route('products.index')->with('message', 'Product Created Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return Inertia::render('Products/Show', ['product' => $product]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $users = User::all();

        return Inertia::render(
            'Products/Edit',
            [
                'product' => $product,
                'users' => $users,
            ]
        );
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('products.index')->with('message', 'Product Updated Successfully');
    }




    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        sleep(1);

        return redirect()->route('products.index')->with('message', 'Product Delete Successfully');
    }
}
