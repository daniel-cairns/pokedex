@extends('master')

@section('content')
	
	<div class="row">
		<div class="columns">
			
			<h1>The Pokedex</h1>

			<ul class="small-block-grid-4">
			
			@foreach( $allPokemon as $pokemon)
				<li><a href="{{ url('pokedex/'.$pokemon->name)}}">{{ $pokemon->name }}</a> </br>caught #{{ $pokemon->capture->count() }} times</li>
			@endforeach

			</ul>

		</div>
	</div>

@endsection