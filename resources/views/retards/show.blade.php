@extends('adminlte::page')

@section('content')
    <h1>Détails du Retard</h1>

    <ul>
        <li><strong>Employé:</strong> {{ $retard->employe->fullname }}</li>
        <li><strong>Date du Retard:</strong> {{ $retard->date_retard }}</li>
        <li><strong>Motif:</strong> {{ $retard->motif }}</li>
        <li><strong>Minutes de Retard:</strong> {{ $retard->minutes_retard }}</li>
        <li><strong>Heure de Début du Retard:</strong> {{ $retard->heure_debut_retard }}</li>
        <li><strong>Heure de Fin du Retard:</strong> {{ $retard->heure_fin_retard }}</li>
        <li><strong>Justifié:</strong> {{ $retard->justifie }}</li>
    </ul>

    <a href="{{ route('retards.edit', $retard->id) }}" class="btn btn-primary">Modifier</a>

    <form action="{{ route('retards.destroy', $retard->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
@endsection
