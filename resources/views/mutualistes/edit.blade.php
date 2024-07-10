<!-- resources/views/mutualistes/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le Mutualiste</h2>
    <form action="{{ route('mutualistes.update', $mutualiste->idMutualiste) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Champs pour les informations de l'assuré -->
        <div class="form-group">
            <label for="nomAssure">Nom</label>
            <input type="text" class="form-control" id="nomAssure" name="nomAssure" value="{{ $mutualiste->assure->nomAssure }}" required>
        </div>
        <div class="form-group">
            <label for="prenomAssure">Prénom</label>
            <input type="text" class="form-control" id="prenomAssure" name="prenomAssure" value="{{ $mutualiste->assure->prenomAssure }}" required>
        </div>
        <div class="form-group">
            <label for="dateNaissanceAssure">Date de Naissance</label>
            <input type="date" class="form-control" id="dateNaissanceAssure" name="dateNaissanceAssure" value="{{ $mutualiste->assure->dateNaissanceAssure }}" required>
        </div>
        <div class="form-group">
            <label for="sexeAssure">Sexe</label>
            <select class="form-control" id="sexeAssure" name="sexeAssure" required>
                <option value="M" {{ $mutualiste->assure->sexeAssure == 'M' ? 'selected' : '' }}>Masculin</option>
                <option value="F" {{ $mutualiste->assure->sexeAssure == 'F' ? 'selected' : '' }}>Féminin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="telephoneAssure">Téléphone</label>
            <input type="text" class="form-control" id="telephoneAssure" name="telephoneAssure" value="{{ $mutualiste->assure->telephoneAssure }}" required>
        </div>
        <div class="form-group">
            <label for="adresseAssure">Adresse</label>
            <input type="text" class="form-control" id="adresseAssure" name="adresseAssure" value="{{ $mutualiste->assure->adresseAssure }}" required>
        </div>
        <div class="form-group">
            <label for="statutAssure">Statut</label>
            <select class="form-control" id="statutAssure" name="statutAssure" required>
                <option value="1" {{ $mutualiste->assure->statutAssure == 1 ? 'selected' : '' }}>Actif</option>
                <option value="0" {{ $mutualiste->assure->statutAssure == 0 ? 'selected' : '' }}>Inactif</option>
            </select>
        </div>
        <div class="form-group">
            <label for="photoAssure">Photo</label>
            <input type="file" class="form-control" id="photoAssure" name="photoAssure" accept="image/png, image/jpeg, image/jpg">
        </div>

        <!-- Champs pour les informations du mutualiste -->
        <div class="form-group">
            <label for="matriculeMutualiste">Matricule</label>
            <input type="text" class="form-control" id="matriculeMutualiste" name="matriculeMutualiste" value="{{ $mutualiste->matriculeMutualiste }}" required>
        </div>
        <div class="form-group">
            <label for="categorieMutualiste">Catégorie</label>
            <select class="form-control" id="categorieMutualiste" name="categorieMutualiste" required>
                <option value="agent" {{ $mutualiste->categorieMutualiste == 'agent' ? 'selected' : '' }}>Agent interne</option>
                <option value="contractuel" {{ $mutualiste->categMutualiste == 'contractuel' ? 'selected' : '' }}>Agent contractuel</option>
                <option value="detache" {{ $mutualiste->categorieMutualiste == 'detache' ? 'selected' : '' }}>Agent Détaché</option>
                <option value="retraite" {{ $mutualiste->categorieMutualiste == 'retraite' ? 'selected' : '' }}>Agent Retraité</option>
            </select>
        <div class="form-group">
            <label for="serviceMutualiste">Service</label>
            <input type="text" class="form-control" id="serviceMutualiste" name="serviceMutualiste" value="{{ $mutualiste->serviceMutualiste }}" required>
        </div>
        <div class="form-group">
            <label for="fonctionMutualiste">Fonction</label>
            <input type="text" class="form-control" id="fonctionMutualiste" name="fonctionMutualiste" value="{{ $mutualiste->fonctionMutualiste }}" required>
        </div>
        <div class="form-group">
            <label for="depensesSante">Dépenses Santé</label>
            <input type="number" class="form-control" id="depensesSante" name="depensesSante" value="{{ $mutualiste->depensesSante }}" required>
        </div>
        <div class="form-group">
            <label for="documentMutualiste">Document</label>
            <input type="file" class="form-control" id="documentMutualiste" name="documentMutualiste" accept="image/png, image/jpeg, image/jpg, application/pdf">
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
