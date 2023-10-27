@extends('adminlte::page')

@section('title', 'Modifier une Demande de Congé')

@section('content')
    <h1>Modifier une Demande de Congé</h1>
    <form action="{{ route('conges.update', $conge->id) }}" method="post">
        @csrf
        @method('PUT')
                <div class="form-group">
            <label for="employe_id">Employé :</label>
            <select class="form-control" id="employe_id" name="employe_id" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $employee->id == $conge->employe_id ? 'selected' : '' }}>
                        {{ $employee->fullname }}
                    </option>
                @endforeach
            </select>
        </div>    
        
        <div class="form-group">
            <label for="date_debut">Date de début :</label>
            <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ $conge->date_debut }}" required>
        </div>
        <div class="form-group">
            <label for="date_fin">Date de fin :</label>
            <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ $conge->date_fin }}" required>
        </div>
        <div class="form-group">
            <label for="motif">Motif :</label>
            <textarea class="form-control" id="motif" name="motif" rows="3" required>{{ $conge->motif }}</textarea>
        </div>
        <div class="form-group">
            <label for="statut">Statut :</label>
          <select class="form-control" id="statut" name="statut" required>
                <option value="en_attente" {{ $conge->statut == 'en_attente' ? 'selected' : '' }}>En attente</option>
                <option value="approuve" {{ $conge->statut == 'approuve' ? 'selected' : '' }}>Approuvé</option>
                <option value="refuse" {{ $conge->statut == 'refuse' ? 'selected' : '' }}>Refusé</option>
            </select>
        </div>
        <div class="form-group">
            <label for="commentaire">Commentaire :</label>
            <textarea class="form-control" id="commentaire" name="commentaire" rows="3">{{ $conge->commentaire }}</textarea>
        </div>
        <div class="form-group">
            <label for="type">Type de Congé :</label>
            <select class="form-control" id="type" name="type" required>
                <option value="conge_paye" {{ $conge->type == 'conge_paye' ? 'selected' : '' }}>Congé payé</option>
                <option value="conge_maladie" {{ $conge->type == 'conge_maladie' ? 'selected' : '' }}>Congé maladie</option>
                <option value="autre" {{ $conge->type == 'autre' ? 'selected' : '' }}>Autre</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
@endsection