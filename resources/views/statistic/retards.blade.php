
@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Liste des Retards de l'Employé</h1>

        @foreach ($retards as $retard)
            <p>Date du Retard: {{ $retard->date_retard }}, Durée: {{ $retard->minutes_retard }} minutes</p>
        @endforeach

        @if (count($retards) === 0)
            <p>Aucun retard enregistré pour cet employé.</p>
        @endif
    </div>
@endsection
