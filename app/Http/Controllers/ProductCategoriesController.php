<?php

/*
* @Author: Patel Sujal M.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductCategory;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $pageinfo = [
            'title' => 'Product Category List',
        ];
        $categorylist = ProductCategory::with('parent_category')->where('user_id',$user_id)->get();
        return view('product_categories.index',compact('categorylist','pageinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageinfo = [
            'title' => 'Add Product Category',
        ];
        $categorylist = ProductCategory::get();
        return view('product_categories.options',compact('categorylist','pageinfo'));
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
            'category_name' => 'required|max:190',
            'parent' => 'numeric'
        ]);

        $category = new ProductCategory;
        $category->name = $request->category_name;
        $category->parent = $request->parent_category;
        $category->user_id = Auth::user()->id;
        if($category->save())
        {
            return redirect()->route('product_categories.index')->with(['toastr'=>'new product category created successfully','type'=>'success']);
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
            'title' => 'Edit Product Category',
        ];
        $category = ProductCategory::find($id);
        $categorylist = ProductCategory::get();
        return view('product_categories.options',compact('category','categorylist','pageinfo'));
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
            'category_name' => 'required|max:190',
            'parent' => 'numeric'
        ]);

        $category = ProductCategory::find($id);
        $category->name = $request->category_name;
        $category->parent = $request->parent_category;
        $category->user_id = Auth::user()->id;
        if($category->save())
        {
            return redirect()->route('product_categories.index')->with(['toastr'=>'product category updated successfully','type'=>'success']);
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
        if(ProductCategory::find($id)->delete())
        {
            ProductCategory::where('parent',$id)->delete();
            return redirect()->route('product_categories.index')->with(['toastr'=>'product category deleted successfully','type'=>'success']);
        }
    }
}
