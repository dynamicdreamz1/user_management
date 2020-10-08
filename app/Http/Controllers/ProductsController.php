<?php

/*
* @Author: Patel Sujal M.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productlist = Product::with('category')->get();
        //dd($productlist);
        $pageinfo = [
            'title' => 'Product List',
        ];
        return view('products.index',compact('productlist','pageinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageinfo = [
            'title' => 'Edit Product',
        ];
        $categorylist = ProductCategory::get();
        return view('products.options',compact('categorylist','pageinfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'   => 'required|max:190',
            'product_description'   => 'required|max:255',
            'product_category'   => 'required|numeric',
            'product_stock'   => 'required|numeric',
            'product_price'   => 'required|numeric',
            'product_weight'   => 'required|numeric',
        ]);

        $product = new Product;
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->category_id = $request->product_category;
        $product->stock = $request->product_stock;
        $product->price = $request->product_price;
        $product->weight = $request->product_weight;
        $product->user_id = Auth::user()->id;
        if($product->save())
        {
            return redirect()->route('products.index')->with(['toastr'=>'new product created successfully','type'=>'success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageinfo = [
            'title' => 'Edit Product',
        ];
        $product = Product::find($id);
        $categorylist = ProductCategory::get();
        return view('products.options',compact('product','categorylist','pageinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name'   => 'required|max:190',
            'product_description'   => 'required|max:255',
            'product_category'   => 'required|numeric',
            'product_stock'   => 'required|numeric',
            'product_price'   => 'required|numeric',
            'product_weight'   => 'required|numeric',
        ]);

        $product = Product::find($id);
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->category_id = $request->product_category;
        $product->stock = $request->product_stock;
        $product->price = $request->product_price;
        $product->weight = $request->product_weight;
        $product->user_id = Auth::user()->id;
        if($product->save())
        {
            return redirect()->route('products.index')->with(['toastr'=>'product updated successfully','type'=>'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Product::find($id)->delete())
        {
            return redirect()->route('products.index')->with(['toastr'=>'product deleted successfully','type'=>'success']);
        }
    }
}
