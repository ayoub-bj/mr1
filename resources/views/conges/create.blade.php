@extends('adminlte::page')

@section('title', 'Demander un Congé')

@section('content')
    <div class="container">
        <h1>Demander un Congé</h1>
        <form action="{{ route('conges.store') }}" method="post" onsubmit="return validateForm()">
            @csrf
          
            <div class="form-group">
                <label for="employe_id">Employé :</label>
                <select class="form-control" id="employe_id" name="employe_id" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="statut">Statut :</label>
                <select class="form-control" id="statut" name="statut" required>
                    <option value="en_attente">En attente</option>
                    <option value="approuve">Approuvé</option>
                    <option value="refuse">Refusé</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date_debut">Date de début :</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut" required>
            </div>
            <div class="form-group">
                <label for="date_fin">Date de fin :</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin" required>
            </div>
            <div class="form-group">
                <label for="motif">Motif :</label>
                <textarea class="form-control" id="motif" name="motif" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="commentaire">Commentaire :</label>
                <textarea class="form-control" id="commentaire" name="commentaire" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="type">Type de Congé :</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="conge_paye">Congé payé</option>
                    <option value="conge_maladie">Congé maladie</option>
                    <option value="autre">Autre</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre la demande</button>
        </form>
    </div>

    <script>
      
    



        function validateForm() {
            var startDate = document.getElementById("date_debut").value;
            var endDate = document.getElementById("date_fin").value;

            if (startDate > endDate) {
                alert("La date de début doit être avant la date de fin.");
                return false;
            }

            return true;
        }
     
    </script>
@endsection
