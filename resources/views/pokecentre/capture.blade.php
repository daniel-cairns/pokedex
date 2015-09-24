@extends('master')

@section('content')

<div class="row">
	<div class="columns">
		<h1>GOTTA CATCH'EM ALL</h1>

		<form action="/pokecentre/capture" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			
			<div>
				<label for="pokemon">Who's that Pokemon?</label>
				<select name="pokemon" id="pokemon">
					@foreach($allPokemon as $pokemon)
					
					<option value="{{ $pokemon->id}}">{{ $pokemon->name }}</option>

					@endforeach
				</select>
				{{ $errors->first('pokemon')}}
			</div>	
			
			<div>
				<label for="photo">Photo</label>
				<input type="file" id="photo" name="photo" class="button">
				{{ $errors->first('photo')}}
			</div>

			<input type="submit" value="Add to Collection" class="tiny button"> 
		</form>
			
	</div>
</div>

@endsection