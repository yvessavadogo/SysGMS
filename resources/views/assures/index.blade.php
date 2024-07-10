<!-- resources/views/mutualistes/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Assures</h2>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assures as $assure)
            <tr>
                <td>{{ $assure->idAssure }}</td>
                <td>{{ $assure->nomAssure }}</td>
                <td>{{ $assure->prenomAssure }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
