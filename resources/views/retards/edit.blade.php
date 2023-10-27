@extends('adminlte::page')


@section('content')
    <h1>Modifier le Retard</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('retards.update', $retard->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="employe_id">Employé :</label>
            <input type="number" name="employe_id" class="form-control" value="{{ $retard->employe_id }}" required>
        </div>

        <div class="form-group">
            <label for="date_retard">Date du Retard:</label>
            <input type="date" name="date_retard" class="form-control" value="{{ $retard->date_retard }}" required>
        </div>

        <div class="form-group">
            <label for="motif">Motif:</label>
            <input type="text" name="motif" class="form-control" value="{{ $retard->motif }}" required>
        </div>

        <div class="form-group">
            <label for="minutes_retard">Minutes de Retard:</label>
            <input type="number" name="minutes_retard" class="form-control" value="{{ $retard->minutes_retard }}" required>
        </div>

        <div class="form-group">
            <label for="heure_debut_retard">Heure de Début du Retard:</label>
            <input type="time" name="heure_debut_retard" class="form-control" value="{{ $retard->heure_debut_retard }}" required>
        </div>

        <div class="form-group">
            <label for="heure_fin_retard">Heure de Fin du Retard:</label>
            <input type="time" name="heure_fin_retard" class="form-control" value="{{ $retard->heure_fin_retard }}" required>
        </div>

        <div class="form-group">
            <label for="justifie">Justifié:</label>
            <select name="justifie" class="form-control" required>
                <option value="oui" {{ $retard->justifie == 'oui' ? 'selected' : '' }}>Oui</option>
                <option value="non" {{ $retard->justifie == 'non' ? 'selected' : '' }}>Non</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
