<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;

class BookController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::all();
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  BookStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {   
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;

        $book->save();
        return $book;
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return $book;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BookUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, $id) 
    {   
        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
    
        $book->update();
        return $book;
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
   
        $book->delete();

        return response()->json('Book successfully deleted!');
    }
}
