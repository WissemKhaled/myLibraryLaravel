@extends('template')
@section('content')
	<div class="style-div">
		<h2>Update</h2>
		<form class="form-container" action="/book/update" method="post">
			@csrf
			<input type="hidden" name="id" value="{{ $book->id }}">
			<input type="text" name="title" value="{{ $book->title }}">
			<input type="text" name="author" value="{{ $book->author }}">
			<input type="text" name="genre" value="{{ $book->genre }}">
			<input type="text" name="excerpt" value="{{ $book->excerpt }}">
			<input type="submit" name="" value="Editer">
		</form>
	</div>
@endsection