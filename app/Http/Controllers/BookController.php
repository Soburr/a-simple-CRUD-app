<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index () {
        $book = Book::where('user_id', Auth::id())->get();
        return view('book.index', compact('book'));
    }


   public function create(){

    return view('book.create');
}

   public function store(Request $request){

       $request->validate([
        'title' => 'required',
        'author' => 'required',
        'ISBN' => 'required']);

       $book = new Book();
       $book ->user_id = Auth::id();
       $book->title = $request->title;
       $book->author = $request->author;
       $book->ISBN = $request->ISBN;

          $book->save();

         return redirect('/book')->with('success', 'A Book has been added Successfully!');

   }

   public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    public function update(Book $book, Request $request)
    {
        $request->validate(['title' => 'required', 'author' => 'required', 'ISBN' => 'required']);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->ISBN = $request->ISBN;

        $book->save();
        return redirect('/book')->with('success','The Book has been updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/book')->with('success','The Book has been deleted successfully!');
    }

    public function logout () {
         auth()->logout();
         return redirect('/');
    }

}
