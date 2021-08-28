<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'  =>  'required|max:30'
        ]);

        $result = DB::table('product_categories')
        ->where('name', $request->input('name'))
        ->get();

    $res = json_decode($result, true);
    print_r($res);

    if (sizeof($res) == 0) {
        $data = $request->input();
        $category = new ProductCategory();
        $category->name = ucwords($data['name']);
        $category->slug = \Str::slug($data['name']);
        $slugs = ProductCategory::whereRaw("slug RLIKE '^{$category->slug}(-[0-9]+)?$'")->latest('id')->value('slug');
        if($slugs){
            $piece = explode('-', $slugs);
            $num = intval(end($piece));
            $category->slug .= '-' .($num + 1);
        }
        $category->save();

        return redirect()->back()->with('success', 'Category added successfully');
        }
        return redirect()->back()->with('error', 'Category Already Exists!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = DB::table('product_categories')
        ->where('name', $request->input('name'))
        ->get();

    $res = json_decode($result, true);
    print_r($res);

    if (sizeof($res) == 0) {
        $data = $request->input();
        $category = ProductCategory::find($id);
        $category->name = ucwords($data['name']);
        $category->slug = \Str::slug($data['name']);
        $slugs = ProductCategory::whereRaw("slug RLIKE '^{$category->slug}(-[0-9]+)?$'")->latest('id')->value('slug');
        if($slugs){
            $piece = explode('-', $slugs);
            $num = intval(end($piece));
            $category->slug .= '-' .($num + 1);
        }
        $category->save();
        return redirect()->back()->with('success', 'Category updated successfully
        ');
    }
        return redirect()->back()->with('error', 'Category Already Exists!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProductCategory::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
