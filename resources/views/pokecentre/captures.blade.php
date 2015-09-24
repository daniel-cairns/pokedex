@extends('master')

@section('content')

<div class="row">
	<div class="columns">
		<h1>Your Captures</h1>
		<ul class="small-block-grid-3">
	@forelse( $captures as $capture )
		<li>
			<div>
				<img src="/img/captures/{{ $capture->photo }}" alt="" style="border: 1px solid black">
				<a href="/pokecentre/captures/{{ $capture->id }}/edit">Edit this capture</a>
			</div>
		</li>		
	@empty
		<li>You have not caught any pokemon YET!</li>	
		<li>Get out there trainer</li>
	@endforelse
		</ul>

	</div>
</div>


@endsection


