<!-- resources/views/mutualistes/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Créer un Mutualiste</h2>
    <form action="{{ route('mutualistes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Champs pour les informations de l'assuré -->
        <div class="form-group">
            <label for="nomAssure">Nom</label>
            <input type="text" class="form-control" id="nomAssure" name="nomAssure" required>
        </div>
        <div class="form-group">
            <label for="prenomAssure">Prénom</label>
            <input type="text" class="form-control" id="prenomAssure" name="prenomAssure" required>
        </div>
        <div class="form-group">
            <label for="dateNaissanceAssure">Date de Naissance</label>
            <input type="date" class="form-control" id="dateNaissanceAssure" name="dateNaissanceAssure" required>
        </div>
        <div class="form-group">
            <label for="sexeAssure">Sexe</label>
            <select class="form-control" id="sexeAssure" name="sexeAssure" required>
                <option value="M">Masculin</option>
                <option value="F">Féminin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="telephoneAssure">Téléphone</label>
            <input type="text" class="form-control" id="telephoneAssure" name="telephoneAssure" required>
        </div>
        <div class="form-group">
            <label for="adresseAssure">Adresse</label>
            <input type="text" class="form-control" id="adresseAssure" name="adresseAssure" required>
        </div>
        <div class="form-group">
            <label for="statutAssure">Statut</label>
            <select class="form-control" id="statutAssure" name="statutAssure" required>
                <option value="1">Actif</option>
                <option value="0">Inactif</option>
            </select>
        </div>
        <div class="form-group">
            <label for="photoAssure">Photo</label>
            <input type="file" class="form-control" id="photoAssure" name="photoAssure" accept="image/png, image/jpeg, image/jpg" required>
        </div>

        <!-- Champs pour les informations du mutualiste -->
        <div class="form-group">
            <label for="matriculeMutualiste">Matricule</label>
            <input type="text" class="form-control" id="matriculeMutualiste" name="matriculeMutualiste" required>
        </div>
        <div class="form-group">
            <label for="categorieMutualiste">Catégorie</label>
            <select class="form-control" id="categorieMutualiste" name="categorieMutualiste" required>
                <option value="agent">Agent interne</option>
                <option value="contractuel">Agent contractuel</option>
                <option value="detache">Agent Détaché</option>
                <option value="retraite">Agent Retraité</option>
            </select>
        </div>
        <div class="form-group">
            <label for="serviceMutualiste">Service</label>
            <input type="text" class="form-control" id="serviceMutualiste" name="serviceMutualiste" required>
        </div>
        <div class="form-group">
            <label for="fonctionMutualiste">Fonction</label>
            <input type="text" class="form-control" id="fonctionMutualiste" name="fonctionMutualiste" required>
        </div>
        <div class="form-group">
            <label for="depensesSante">Dépenses Santé</label>
            <input type="number" class="form-control" id="depensesSante" name="depensesSante" required>
        </div>
        <div class="form-group">
            <label for="documentMutualiste">Document</label>
            <input type="file" class="form-control" id="documentMutualiste" name="documentMutualiste" accept="image/png, image/jpeg, image/jpg, application/pdf">

        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
