<!-- resources/views/mutualistes/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Mutualistes</h2>
    <a href="{{ route('mutualistes.create') }}" class="btn btn-primary">Ajouter un Mutualiste</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Matricule</th>
                <th>Catégorie</th>
                <th>Nombre de PAC</th>
                 <th>Cumul des dépenses</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mutualistes as $mutualiste)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mutualiste->assure->nomAssure }}</td>
                <td>{{ $mutualiste->assure->prenomAssure }}</td>
                <td>{{ $mutualiste->matriculeMutualiste }}</td><td>
                    {{
                        $mutualiste->categorieMutualiste == 'agent' ? 'Agent interne' :
                        ($mutualiste->categorieMutualiste == 'contractuel' ? 'Agent contractuel' :
                        ($mutualiste->categorieMutualiste == 'detache' ? 'Agent Détaché' :
                        ($mutualiste->categorieMutualiste == 'retraite' ? 'Agent Retraité' : '')))
                    }}
                </td>
                <td>{{ $mutualiste->personnes_a_charge_count  }}</td>
                <td>{{ $mutualiste->depensesSante }}</td>
                <td>

                    <a href="{{ route('mutualistes.show', $mutualiste->idMutualiste) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('mutualistes.edit', $mutualiste->idMutualiste) }}" class="btn btn-warning">Modifier</a>
                    <a href="{{ route('personnes_a_charge.index', ['idMutualiste' => $mutualiste->idMutualiste, 'idAssure' => $mutualiste->idAssure]) }}" class="btn btn-success">Personnes à charge</a>
                    <form action="{{ route('mutualistes.destroy', $mutualiste->idMutualiste) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
