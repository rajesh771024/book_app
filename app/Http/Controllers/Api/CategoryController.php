<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return response()->json([
            'categories'=>$categories
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $category=new Category();
        $category->name=$request->name;
        $category->save();

        return response()->json([
            'category'=>$category
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json([
            'category'=>$category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $category->name=$request->name;
        $category->save();

        return response()->json([
            'category'=>$category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'category'=>$category
        ]);
    }
}
