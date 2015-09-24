@extends('master')

@section('content')
	
	<div class="row">
		<div class="columns">
			<h1>Welcome to the Pokecentre {{ Auth::user()->name }}</h1>

			<h2>Trainer stats</h2>
			<ul class="">
				<li>Your trainer ID is {{ Auth::user()->id }}</li>
				<li>Your Email is {{ Auth::user()->id }}</li>
				<li>You have captured {{ $totalTrainerCaptures }} Pokemon</li>
			</ul>

			<h2>Global Stats</h2>
			<ul>
				<li>Total number of registerd trainers {{ $totalTrainers }}</li>
				<li>Total number of captured Pokemon {{ $totalGlobalCaptures }}</li>
			</ul>

			<a href="/pokecentre/capture">Capture</a>
			
		</div>
	</div>

@endsection