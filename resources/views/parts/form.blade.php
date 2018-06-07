		@csrf
			@foreach ($bookForm as $key => $value) 
				<label for="{{ $key }}">{{ $key }} : </label>
				<input type="{{ $value }}" name="book[0][{{ $key }}]" id="{{ $key }}" value="">	
			@endforeach

			@foreach ($bookForm1 as $key => $value) 
				<label for="{{ $key }}">{{ $key }} : </label>
				<input type="{{ $value }}" name="book[1][{{ $key }}]" id="{{ $key }}" value="">	
			@endforeach