<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors=Author::with('books')->get();
        return response()->json([
            'authors'=>$authors
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required'
        ]);

        $author=new Author();
        $author->first_name=$request->first_name;
        $author->last_name=$request->last_name;
        $author->save();

        return response()->json([
            'author'=>$author
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return response()->json([
            'author'=>$author
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required'
        ]);


        $author->first_name=$request->first_name;
        $author->last_name=$request->last_name;
        $author->save();

        return response()->json([
            'author'=>$author
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
       $author->delete();
        return response()->json([
            'author'=>$author
        ]);
    }
}
