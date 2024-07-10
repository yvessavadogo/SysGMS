<!-- resources/views/personnes_a_charge/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier la Personne à Charge</h2>
    <form action="{{ route('personnes_a_charge.update', $personneACharge->idPAC) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Champs pour les informations de l'assuré -->
        <div class="form-group">
            <label for="nomAssure">Nom</label>
            <input type="text" class="form-control" id="nomAssure" name="nomAssure" value="{{ $personneACharge->assure->nomAssure }}" required>
        </div>
        <div class="form-group">
            <label for="prenomAssure">Prénom</label>
            <input type="text" class="form-control" id="prenomAssure" name="prenomAssure" value="{{ $personneACharge->assure->prenomAssure }}" required>
        </div>
        <div class="form-group">
            <label for="dateNaissanceAssure">Date de Naissance</label>
            <input type="date" class="form-control" id="dateNaissanceAssure" name="dateNaissanceAssure" value="{{ $personneACharge->assure->dateNaissanceAssure }}" required>
        </div>
        <div class="form-group">
            <label for="sexeAssure">Sexe</label>
            <select class="form-control" id="sexeAssure" name="sexeAssure" required>
                <option value="M" {{ $personneACharge->assure->sexeAssure == 'M' ? 'selected' : '' }}>Masculin</option>
                <option value="F" {{ $personneACharge->assure->sexeAssure == 'F' ? 'selected' : '' }}>Féminin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="telephoneAssure">Téléphone</label>
            <input type="text" class="form-control" id="telephoneAssure" name="telephoneAssure" value="{{ $personneACharge->assure->telephoneAssure }}" required>
        </div>
        <div class="form-group">
            <label for="adresseAssure">Adresse</label>
            <input type="text" class="form-control" id="adresseAssure" name="adresseAssure" value="{{ $personneACharge->assure->adresseAssure }}" required>
        </div>
        <div class="form-group">
            <label for="statutAssure">Statut</label>
            <select class="form-control" id="statutAssure" name="statutAssure" required>
                <option value="1" {{ $personneACharge->assure->statutAssure == 1 ? 'selected' : '' }}>Actif</option>
                <option value="0" {{ $personneACharge->assure->statutAssure == 0 ? 'selected' : '' }}>Inactif</option>
            </select>
        </div>
        <div class="form-group">
            <label for="photoAssure">Photo</label>
            <input type="file" class="form-control" id="photoAssure" name="photoAssure" accept="image/png, image/jpeg, image/jpg">
        </div>

        <!-- Champs pour les informations de la personne à charge -->

            <input type="number" class="form-control" id="Mut_idAssure" name="Mut_idAssure" value="{{ $personneACharge->Mut_idAssure }}" hidden required>

            <input type="number" class="form-control" id="idMutualiste" name="idMutualiste" value="{{ $personneACharge->idMutualiste }}" hidden required>

        <div class="form-group">
            <label for="affilliationPAC">Affiliation</label>
            <select class="form-control" id="affilliationPAC" name="affilliationPAC" required>
                <option value="conjoint" {{ $personneACharge->affilliationPAC == 'conjoint' ? 'selected' : '' }}>Conjoint(e)</option>
                <option value="enfant" {{ $personneACharge->affilliationPAC == 'enfant' ? 'selected' : '' }}>Enfant</option>
            </select>
        </div>
        <div class="form-group">
            <label for="documentAffiliationPAC">Document d'Affiliation</label>
            <input type="file" class="form-control" id="documentAffiliationPAC" name="documentAffiliationPAC" accept="image/png, image/jpeg, image/jpg, application/pdf">
        </div>
        <div class="form-group">
            <label for="certificatScolarite">Certificat de Scolarité</label>
            <input type="file" class="form-control" id="certificatScolarite" name="certificatScolarite" accept="image/png, image/jpeg, image/jpg, application/pdf">
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
