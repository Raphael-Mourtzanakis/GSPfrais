@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Liste des employés</h1>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID État</th>
            <th>Années-Mois</th>
            <th>ID Visiteur</th>
            <th>Intérêt</th>
            <th>Nombre des justificatifs</th>
            <th>Date de modification</th>
            <th>Montant validé</th>
        </tr>
        </thead>
        <tbody>
        @foreach($desFrais as $frs)
            <tr>
                <td>{{ $frs->id_etat }}</td>
                <td>{{ $frs->anneemois }}</td>
                <td>{{ $frs->id_visiteur }}</td>
                <td>{{ $frs->nbjustificatifs }}</td>
                <td>{{ $frs->datemodification }}</td>
                <td>{{ $frs->montantvalide }}</td>
                <td><a href="{{url("/editerFrais/".$frs->id_frais)}}">Afficher</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
