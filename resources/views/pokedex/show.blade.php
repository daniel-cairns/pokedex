@extends('master')

@section('content')

<div class="row">
	<div class="columns">
		<h1><small>Pokemon #{{ $pokemon->id}}</small> {{ $pokemon->name }}</h1>
	</div>
	<ul class="small-block-grid-4">
	@foreach( $pokemon->capture as $capture )
		<li>
			<figure>
				<img src="/img/captures/{{ $capture->photo }}" alt="">
				<figcaption>
					Caught by {{ $capture->user ->name }}
				</figcaption>
			</figure>
		</li>
	@endforeach
	</ul>	
</div>


@endsection