<?php

namespace App\Http\Controllers;
use App\Models\Books;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index () {
        $book = Books::all();
        return view('book.index', compact('book'));
    }


   public function create(){

    return view('book.create');
}

   public function store(Request $request){

       $request->validate(['title' => 'required', 'author' => 'required', 'ISBN' => 'required']);
       $book= new Books();
       $book->title = $request->title;
       $book->author = $request->author;
       $book->ISBN = $request->ISBN;

       $book->save();
         return redirect('/book')->with('success', 'A Book has been added Successfully!');
   }

   public function show(Books $book)
    {
        return view('book.show', compact('book'));
    }

    public function edit(Books $book)
    {
        return view('book.edit', compact('book'));
    }

    public function update(Books $book, Request $request)
    {
        $request->validate(['title' => 'required', 'author' => 'required', 'ISBN' => 'required']);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->ISBN = $request->ISBN;

        $book->save();
        return redirect('/book')->with('success','The Book has been updated successfully!');
    }

    public function destroy(Books $book)
    {
        $book->delete();
        return redirect('/book')->with('success','The Book has been deleted successfully!');
    }

    public function logout () {
         auth()->logout();
         return redirect('/');
    }

}
