@extends('adminlte::page')

@section('title', 'Détails de la Demande de Congé')

@section('content')
    <h1>Détails de la Demande de Congé</h1>
    <p><strong>Employé :</strong> {{ $conge->employe->fullname }}</p>
    <p><strong>Date de Début :</strong> {{ $conge->date_debut }}</p>
    <p><strong>Date de Fin :</strong> {{ $conge->date_fin }}</p>
    <p><strong>Motif :</strong> {{ $conge->motif }}</p>
    <p><strong>Statut :</strong> {{ ucfirst($conge->statut) }}</p>
    <p><strong>Commentaire :</strong> {{ $conge->commentaire }}</p>
    <p><strong>Type de Congé :</strong> {{ ucfirst($conge->type) }}</p>

    <a href="{{ route('conges.edit', $conge->id) }}" class="btn btn-primary">Modifier</a>

    <form action="{{ route('conges.destroy', $conge->id) }}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>

    <a href="{{ route('conges.index') }}" class="btn btn-secondary">Retourner à la Liste des Congés</a>
@endsection
