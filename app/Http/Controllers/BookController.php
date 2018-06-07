<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Book as Book;

class BookController extends Controller
{
    public function display ()
    {
      $book = Book::all()->sortBy('title');
   		return view('book.show', ['books' => Book::all()]);
    }

    public function insert()
    {
    	$book = new Book;
    	$bookColumn = $book->getTableColumns();
    	$bookForm = [];
    	array_shift($bookColumn);
    	array_pop($bookColumn);
    	array_pop($bookColumn);
    	foreach ($bookColumn as $key => $value) {
    		$bookForm[$value] = "text";
    	}
    	return view('book.insert', ['bookForm' => $bookForm]);
    }

    public function insertAction(Request $request)
    {
      $formData = $request->input('book');  

      foreach ($$formData as $key => $value) {
        $book = new Book;
        $book->title = $form['title'];
        $book->author = $form['author'];
        $book->genre = $form['genre'];
        $book->excerpt = $form['excerpt'];
        $book->save();
      }
      return redirect('/book');
    }

    public function deleteAction(Request $request)
    {
      foreach (explode(",", $request->input('ids')) as $key => $value) {
        Book::destroy($value);
      }
      return 'true';
    }

    public function update(Request $request)
    {
      $book = Book::findOrFail($request->input('id'));

      $bookColumn = $book->getTableColumns();
      $bookForm = [];
      array_shift($bookColumn);
      array_pop($bookColumn);
      array_pop($bookColumn);
      foreach ($bookColumn as $key => $value) {
        $bookForm[$value] = "text";
    } 
      return view('book.update', [
        'book' => $book,
        'bookColumn' => $bookForm,
      ]);
    }

    public function updateAction(Request $request)
    {
      $form = $request->input();
      $book = Book::find($request->input('id'));
      $book->title = $form['title'];
      $book->author = $form['author'];
      $book->genre = $form['genre'];
      $book->excerpt = $form['excerpt'];
      $book->save();
      return redirect('/book');
    }


}
