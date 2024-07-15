<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $editor_id = Session::get('userId');
        $products = Product::where('editor_id', $editor_id)->get();

        return view('editor.products.index', [
            "products" => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $editor_id = Session::get('userId');

        if($product->editor_id != $editor_id) {
            $products = Product::where('editor_id', $editor_id)->get();
            return view('editor.products.index', [
                "products" => $products,
            ]);
        } else {
            return view('editor.products.show', [
                "product" => $product,
            ]);
        }        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
