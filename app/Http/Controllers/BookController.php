<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
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
        return Book::get();
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  BookStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {   
        Book::create(
                    [
                        'id' => $request->id,
                        'title' => $request->title, 
                        'author' => $request->author,
                    ]);
        return Book::all();
    }
    
    public function show($id)
    {
        Book::find($id);
        return Book::all();
    }

    public function update(BookUpdateRequest $request, $id) 
    {   
        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
    
        $book->update();
        return Book::all();
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
   
        $book->delete();

        return Book::all();
    }
}
