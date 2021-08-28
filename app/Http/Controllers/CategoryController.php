<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            if (session('errorForm')) {
                $html = "<ul style='list-style: none;'>";
                foreach (session('errorForm') as $error) {
                    $html .= "<li>$error[0]</li>";
                }
                $html .= "</ul>";

                Alert::html('Error during the creation!', $html, 'error');
            }



            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index');
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
            'categoryName'  =>  'required|max:30'
        ]);

        $result = DB::table('categories')
        ->where('categoryName', $request->input('categoryName'))
        ->get();

    $res = json_decode($result, true);
    print_r($res);

    if (sizeof($res) == 0) {
        $data = $request->input();
        $category = new Category();
        $category->categoryName = ucwords($data['categoryName']);
        $category->slug = \Str::slug($data['categoryName']);
        $slugs = Category::whereRaw("slug RLIKE '^{$category->slug}(-[0-9]+)?$'")->latest('id')->value('slug');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = DB::table('categories')
        ->where('categoryName', $request->input('categoryName'))
        ->get();

    $res = json_decode($result, true);
    print_r($res);

    if (sizeof($res) == 0) {
        $data = $request->input();
        $category = Category::find($id);
        $category->categoryName = ucwords($data['categoryName']);
        $category->slug = \Str::slug($data['categoryName']);
        $slugs = Category::whereRaw("slug RLIKE '^{$category->slug}(-[0-9]+)?$'")->latest('id')->value('slug');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
