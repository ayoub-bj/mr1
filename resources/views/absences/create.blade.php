@extends('adminlte::page')

@section('content')
    <div class="container mt-4">
        <h1>Créer une Nouvelle Absence</h1>

        <form action="{{ route('absences.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="employe_id">Employé :</label>
                <select name="employe_id" class="form-control" required>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date_absence">Date de l'Absence :</label>
                <input type="date" name="date_absence" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="motif">Motif :</label>
                <input type="text" name="motif" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="type_absence">Type d'Absence :</label>
                <input type="text" name="type_absence" class="form-control" required>
            </div>

            <div class="form-group">
    <label for="justificatif">Justifié :</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="justificatif" id="justifie" value="justifie">
        <label class="form-check-label" for="justifie">
            Justifié
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="justificatif" id="non-justifie" value="non-justifie">
        <label class="form-check-label" for="non-justifie">
            Non Justifié
        </label>
    </div>
</div>


            <div class="form-group">
                <label for="heure_debut_absence">Heure de Début :</label>
                <input type="time" name="heure_debut_absence" class="form-control">
            </div>

            <div class="form-group">
                <label for="heure_fin_absence">Heure de Fin :</label>
                <input type="time" name="heure_fin_absence" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
