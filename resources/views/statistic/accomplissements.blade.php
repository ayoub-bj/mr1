<!-- resources/views/statistic/accomplissements.blade.php -->

@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Liste des Accomplissements de l'Employé</h1>

    @foreach ($accomplissements as $accomplissement)
        <p>Date d'Accomplissement: {{ $accomplissement->date_accomplissement }}, Réalisation: {{ $accomplissement->realisation }}</p>
    @endforeach

    @if (count($accomplissements) === 0)
        <p>Aucun accomplissement enregistré pour cet employé.</p>
    @endif
</div>
@endsection
