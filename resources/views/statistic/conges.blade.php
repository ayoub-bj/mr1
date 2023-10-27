<!-- resources/views/statistic/conges.blade.php -->

@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Liste des Congés de l'Employé</h1>

    @foreach ($conges as $conge)
        <p>Date du Congé: {{ $conge->date_conge }}, Durée: {{ $conge->duree }} jours</p>
    @endforeach

    @if (count($conges) === 0)
        <p>Aucun congé enregistré pour cet employé.</p>
    @endif
</div>
@endsection
