@extends('template')
@section('content')
	<div class="style-div">
		<form class="form-container" action="/book/new" method="post">
			@csrf
			@foreach ($bookForm as $key => $value) 
				<label for="{{ $key }}">{{ $key }} : </label>
				<input type="{{ $value }}" name="book[0][{{ $key }}]" id="{{ $key }}" value="">	
			@endforeach
			@foreach ($bookForm as $key => $value) 
				<label for="{{ $key }}">{{ $key }} : </label>
				<input type="{{ $value }}" name="book[0][{{ $key }}]" id="{{ $key }}" value="">	
			@endforeach


			<input type="submit" name="" value="Inserer">
		</form>
	</div>
@endsection