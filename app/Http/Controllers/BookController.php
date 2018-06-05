<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Book as Book;

class BookController extends Controller
{
    public function display ()
    {
    	// Si on rentre la table à la main
   		/*$books = [
   			[
   				"title" => "Harry Potter et la chambre des secrets",
   				"author" => "JK Rowling",
   				"genre" => "Fantastique",
   				"excerpt" => "C'est l'histoire d'un garçon sorcier qui va tuer un gros serpent",
   			],
   			[
   				"title" => "Le seigneur des anneaux",
   				"author" => "JRR Tolkien",
   				"genre" => "Epic",
   				"excerpt" => "Les aléas d'un commis de bijoutier au milieu des terres",
   			],
   			[
   				"title" => "Le jour des fourmis",
   				"author" => "Bernard Werber",
   				"genre" => "Bizarre",
   				"excerpt" => "La vie passionante de petit etre qui ne sont pas si petit que ça",
   			],
   		];*/
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
      $form = $request->input();
      $book = new Book;
      $book->title = $form['title'];
      $book->author = $form['author'];
      $book->genre = $form['genre'];
      $book->excerpt = $form['excerpt'];
      $book->save();
      return redirect('/book');
    }

    public function deleteAction(Request $request)
    {
      Book::destroy($request->input('id'));
      return redirect('/book');
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
