@extends('master')

@section('content')
	
	<div class="row">
		<div class="columns">
			
			<h1>The Pokedex</h1>

			<ul>
			
			@foreach( $allPokemon as $pokemon)
				<li><a href="">{{ $pokemon->name }}</a></li>
			@endforeach

			</ul>

		</div>
	</div>

@endsection