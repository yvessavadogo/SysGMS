@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nomUtilisateur" class="col-md-4 col-form-label text-md-end">Nom</label>

                            <div class="col-md-6">
                                <input id="nomUtilisateur" type="text" class="form-control @error('nomUtilisateur') is-invalid @enderror" name="nomUtilisateur" value="{{ old('nomUtilisateur') }}" required autocomplete="nomUtilisateur" autofocus>

                                @error('nomUtilisateur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prenomUtilisateur" class="col-md-4 col-form-label text-md-end">Prénom</label>

                            <div class="col-md-6">
                                <input id="prenomUtilisateur" type="text" class="form-control @error('prenomUtilisateur') is-invalid @enderror" name="prenomUtilisateur" value="{{ old('prenomUtilisateur') }}" required autocomplete="prenomUtilisateur" autofocus>

                                @error('prenomUtilisateur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">Nom d'utilisateur</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="idRole" class="col-md-4 col-form-label text-md-end">Rôle</label>

                            <div class="col-md-6">
                                <select id="idRole" class="form-control @error('idRole') is-invalid @enderror" name="idRole" required>
                                    <option value="1">Administrateur</option>
                                    <option value="2">Chef Prestations</option>
                                    <option value="3">Assistant</option>
                                </select>


                                @error('idRole')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Adresse Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmer le mot de passe</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="statutUtilisateur" class="col-md-4 col-form-label text-md-end">Rôle</label>

                            <div class="col-md-6">
                                <select id="statutUtilisateur" class="form-control @error('statutUtilisateur') is-invalid @enderror" name="statutUtilisateur" required>
                                    <option value="1">Actif</option>
                                    <option value="0">Inactif</option>
                                </select>


                                @error('statutUtilisateur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
