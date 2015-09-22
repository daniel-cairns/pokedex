@extends('master')

@section('content')
	
	<div class="row">
		<div class="columns">
			<h1>Welcome to the Pokecentre {{ Auth::user()->name }}</h1>

			<h2>Trainer stats</h2>
			<ul>
				<li>Your trainer ID is {{ Auth::user()->id }}</li>
				<li>Your Email is {{ Auth::user()->id }}</li>
			</ul>

			<h2>Global Stats</h2>
			<ul>
				<li>Total number of registerd trainers {{ $totalTrainers }}</li>
			</ul>

		</div>
	</div>

@endsection