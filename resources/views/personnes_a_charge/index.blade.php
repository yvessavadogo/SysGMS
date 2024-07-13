<!-- resources/views/personnes_a_charge/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Personnes à Charge de {{ $mutualiste->assure->nomAssure }} {{ $mutualiste->assure->prenomAssure }}</h2>
    <a href="{{ route('personnes_a_charge.create', $idMutualiste) }}" class="btn btn-primary">Ajouter une Personne à charge</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Sexe</th>
                <th>Date de Naissance</th>
                <th>Mutualiste Associé</th>
                <th>Affiliation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personnesACharge as $personneACharge)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $personneACharge->assure->nomAssure }}</td>
                <td>{{ $personneACharge->assure->prenomAssure }}</td>
                <td>{{ $personneACharge->assure->sexeAssure }}</td>
                <td>{{ $personneACharge->assure->dateNaissanceAssure }}</td>
                <td>{{ $personneACharge->mutualiste->assure->nomAssure }} {{ $personneACharge->mutualiste->assure->prenomAssure }}</td>
                <td>

                    {{
                        $personneACharge->affilliationPAC == 'conjoint' ? 'Conjoint(e)' :
                        ($personneACharge->affilliationPAC == 'enfant' ? 'Enfant' : '')
                    }}

                </td>
                <td>
                    <a href="{{ route('personnes_a_charge.show', $personneACharge->idPAC) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('personnes_a_charge.edit', $personneACharge->idPAC) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('personnes_a_charge.destroy', $personneACharge->idPAC) }}" method="POST" style="display:inline-block;">
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
