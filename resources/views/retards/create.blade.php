@extends('adminlte::page')

@section('content')
    <h1>Créer un Retard</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('retards.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="employe_id">Employé :</label>
            <select name="employe_id" class="form-control" required>
                @foreach ($employes as $employe)
                    <option value="{{ $employe->id }}">{{ $employe->fullname }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date_retard">Date du Retard:</label>
            <input type="date" name="date_retard" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="motif">Motif:</label>
            <input type="text" name="motif" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="minutes_retard">Minutes de Retard:</label>
            <input type="number" name="minutes_retard" class="form-control" required>
        </div>

    

        <div class="form-group">
            <label for="justifie">Justifié:</label>
            <select name="justifie" class="form-control" required>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
