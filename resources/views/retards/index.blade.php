@extends('adminlte::page')


@section('content')
    <h1>Liste des Retards</h1>
    <table class="table">
        <thead>
            <tr>
                
                <th>Employé</th>
                <th>Date du Retard</th>
                <th>Motif</th>
                <th>Minutes de Retard</th>
                <th>Justifié</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($retards as $retard)
                <tr>
                    
                    <td>{{ $retard->employe->fullname }}</td>
                    <td>{{ $retard->date_retard }}</td>
                    <td>{{ $retard->motif }}</td>
                    <td>{{ $retard->minutes_retard }}</td>
                    <td>{{ $retard->justifie }}</td>
                    <td>
                        <a href="{{ route('retards.show', $retard->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('retards.edit', $retard->id) }}" class="btn btn-primary">Modifier</a>
                        <!-- Ajoutez ici d'autres liens d'action si nécessaire -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
