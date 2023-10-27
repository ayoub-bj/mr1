@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Liste des Employés avec Statistiques RH</h1>

    @foreach($employees as $employee)
        <div class="card mb-3">
            <div class="card-header">
                <h2>{{ $employee->fullname }}</h2>
            </div>
            <div class="card-body">
                <h3>Statistiques RH :</h3>
                @foreach($statistics as $statistic)
                    @if($statistic->employe_id === $employee->id)
                        <p>
                            Mois: {{ $statistic->mois }}, Année: {{ $statistic->annee }},
                            Absences: {{ $statistic->nombre_absences }}, Retards: {{ $statistic->nombre_retards }}
                            </p>
                    @endif
                @endforeach
                <a href="{{ route('statistics.show', $employee->id) }}" class="btn btn-primary">Voir</a>
                <a href="{{ route('statistics.retards', $employee->id) }}" class="btn btn-primary">Retards</a>

                <a href="{{ route('statistics.conges', $employee->id) }}" class="btn btn-primary">Congés</a>
                <a href="{{ route('statistics.accomplissements', $employee->id) }}" class="btn btn-primary">Accomplissements</a>
                <a href="{{ route('statistics.absences', $employee->id) }}" class="btn btn-primary">Absences</a>

            </div>
        </div>
    @endforeach

    @if(count($employees) === 0)
        <p>Aucun employé avec des statistiques disponibles.</p>
    @endif
</div>
@endsection
