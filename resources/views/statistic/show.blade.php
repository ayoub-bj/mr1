@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Statistiques de l'employé</h1>
    <p>Nom de l'employé: {{ $employe->fullname}}</p>

    <h2>Statistiques :</h2>
    <p>Nombre de retards : {{ $retardsCount }}</p>
    <p>Nombre de congés : {{ $congesCount }}</p>
    <p>Nombre d'accomplissements : {{ $accomplissementsCount }}</p>
    <p>Nombre d'absences : {{ $absencesCount }}</p>

    <canvas id="statisticChart" width="400" height="400"></canvas>
</div>
@endsection



