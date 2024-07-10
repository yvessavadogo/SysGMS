<!-- resources/views/mutualistes/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Utilisateurs</h2>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Nom d'utilisateur</th>
                <th>Adresse Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->nomUtilisateur }}</td>
                <td>{{ $user->prenomUtilisateur }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
