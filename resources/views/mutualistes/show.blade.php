<!-- resources/views/mutualistes/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails du Mutualiste</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $mutualiste->assure->nomAssure }} {{ $mutualiste->assure->prenomAssure }}</h5>
            @if($mutualiste->assure->photoAssure)
                <img src="data:image/jpeg;base64,{{ base64_encode($mutualiste->assure->photoAssure) }}" alt="Photo de {{ $mutualiste->assure->prenomAssure }}" class="img-thumbnail mb-3" style="max-width: 150px;">
            @endif
            <p class="card-text">Matricule : {{ $mutualiste->matriculeMutualiste }}</p>
            <p class="card-text">Catégorie :
                {{
                    $mutualiste->categorieMutualiste == 'agent' ? 'Agent interne' :
                    ($mutualiste->categorieMutualiste == 'contractuel' ? 'Agent contractuel' :
                    ($mutualiste->categorieMutualiste == 'detache' ? 'Agent Détaché' :
                    ($mutualiste->categorieMutualiste == 'retraite' ? 'Agent Retraité' : '')))
                }}

            </p>
            <p class="card-text">Service : {{ $mutualiste->serviceMutualiste }}</p>
            <p class="card-text">Fonction : {{ $mutualiste->fonctionMutualiste }}</p>
            <p class="card-text">Date de naissance : {{ $mutualiste->assure->dateNaissanceAssure }}</p>
            <p class="card-text">Téléphone : {{ $mutualiste->assure->telephoneAssure }}</p>
            <p class="card-text">Adresse : {{ $mutualiste->assure->adresseAssure }}</p>
            <p class="card-text">Statut : {{ $mutualiste->assure->statutAssure == 1 ? 'Actif' : 'Inactif' }}</p>
            <p class="card-text">Nombre de personnes à charge : {{ $mutualiste->personnes_a_charge_count }}</p>
            <p class="card-text">Cumul Dépenses Santé : {{ $mutualiste->depensesSante }}</p>
            <a href="{{ route('mutualistes.edit', $mutualiste->idMutualiste) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('mutualistes.destroy', $mutualiste->idMutualiste) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
