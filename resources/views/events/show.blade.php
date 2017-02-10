@extends('layouts.app')

@section('content')
	<h1>{{ $event->title }}</h1>

	<p>{{ $event->description }}</p>
		
	<a class="btn btn-default" href="{{ route('events.edit', $event) }}">Modifier</a> 

	<form 
		action="{{ route('events.destroy', $event) }}" 
		method="POST" 
		class="inline-block"
		onsubmit="return confirm('Etes-vous sûr');" 
		>
		{{ csrf_field() }}
		{{ method_field('DELETE') }}

		<input type="submit" name="" value="Supprimer" class="btn btn-danger">
	</form>
	
	<hr>
	
	<p>
		<a href="{{ route('home') }}">Tous les évenements</a>
	</p>
@stop