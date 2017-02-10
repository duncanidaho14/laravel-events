@extends('layouts.app')

@section('content')
	<h1>Créer un évenement</h1>

	<form action="{{ route('events.store') }}" method="POST">
		{{ csrf_field() }}
		
		@include('events/_form', ['submitButtonText' => "Créer un evenement"])

		
			
	</form>

	<p><a href="{{ route('home') }}">Annuler</a></p>
@stop