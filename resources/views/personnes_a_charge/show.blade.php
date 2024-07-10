<!-- resources/views/personnes_a_charge/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails de la Personne à Charge</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $personneACharge->assure->nomAssure }} {{ $personneACharge->assure->prenomAssure }}</h5>
            @if($personneACharge->assure->photoAssure)
                <img src="data:image/jpeg;base64,{{ base64_encode($personneACharge->assure->photoAssure) }}" alt="Photo de {{ $personneACharge->assure->prenomAssure }}" class="img-thumbnail mb-3" style="max-width: 150px;">
            @endif
            <p class="card-text">Date de naissance : {{ $personneACharge->assure->dateNaissanceAssure }}</p>
            <p class="card-text">Sexe : {{ $personneACharge->assure->sexeAssure }}</p>
            <p class="card-text">Mutualiste : {{ $personneACharge->mutualiste->assure->nomAssure }} {{ $personneACharge->mutualiste->assure->prenomAssure }}</p>
            <p class="card-text">Affiliation : {{
                $personneACharge->affilliationPAC == 'conjoint' ? 'Conjoint(e)' :
                ($personneACharge->affilliationPAC == 'enfant' ? 'Enfant' : '')
            }}
            </p>

                    <p class="card-text">Statut : {{ $personneACharge->assure->statutAssure == 1 ? 'Actif' : 'Inactif' }}</p>
            <a href="{{ route('personnes_a_charge.edit', $personneACharge->idPAC) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('personnes_a_charge.destroy', $personneACharge->idPAC) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
