<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::with(['category','authors'])->get();
        return response()->json([
            'books'=>$books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           'name'=>['required'],
           'category_id'=>['required','exists:category,id'],
           'author_id'=>['required','exists:author:id']
       ]);

       $book=new book();
       $book->name=$request->name;
       $book->category_id=$request->category_id;
       $book->author_id=$request->author_id;
       $book->save();

        return response()->json([
            'book'=>$book
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book->load(['category','author']);
        return response()->json([
            'book'=>$book
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name'=>['required'],
            'category_id'=>['nullable','exists:category,id'],
            'author_id'=>['nullable','exists:author:id']
        ]);

        $book=new book();
        $book->name=$request->name;
        if($request->category_id!=null)
        {
            $book->category_id=$request->category_id;
        }
        if($request->category_id!=null) {
            $book->author_id = $request->author_id;
        }
        $book->save();

        return response()->json([
            'book'=>$book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'book'=>$book
        ]);
    }
}
