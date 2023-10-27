@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Liste des Absences de l'Employé</h1>

    @foreach ($absences as $absence)
        <p>Date d'Absence: {{ $absence->date_absence }}, Motif: {{ $absence->motif }}, Justifié: {{ $absence->justificatif ?? 'Non spécifié' }}</p>
    @endforeach

    @if (count($absences) > 0)
        <p>Nombre total d'absences : {{ count($absences) }}</p>
        <div style="display: flex;">
            <div style="width: 400px; height: 400px;">
                <canvas id="absenceChart"></canvas>
            </div>
        </div>
    @else
        <p>Aucune absence enregistrée pour cet employé.</p>
    @endif
</div>

<script>
    // Récupérer le nombre d'absences justifiées et non justifiées
// Récupérer le nombre d'absences justifiées et non justifiées
var justifiees = {{ $absences->where('justificatif', '=', 'justifie')->whereNotNull('justificatif')->count() }};
var nonJustifiees = {{ $absences->where('justificatif', '=', 'non-justifie')->whereNotNull('justificatif')->count() }};

    // Créer un diagramme circulaire
    var ctx = document.getElementById('absenceChart').getContext('2d');
    var absenceChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Absences Justifiées', 'Absences Non Justifiées'],
            datasets: [{
                data: [justifiees, nonJustifiees],
                backgroundColor: ['green', 'red']
            }]
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection
