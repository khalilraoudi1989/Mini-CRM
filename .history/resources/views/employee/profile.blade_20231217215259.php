<!-- Dans resources/views/employee/profile.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mon Profil</h1>

        <form method="POST" action="{{ route('employee.update-profile') }}">
            @csrf
            @method('PATCH')

            <!-- Afficher les informations actuelles de l'employé -->
            <p><strong>Nom:</strong> {{ $employee->name }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Adresse:</strong> {{ $employee->adresse }}</p>
            <p><strong>Téléphone:</strong> {{ $employee->telephone }}</p>
            <p><strong>Date de Naissance:</strong> {{ $employee->date_de_naissance }}</p>

            <!-- Ajouter les champs de formulaire pour les informations modifiables -->
            <label for="adresse">Nouvelle Adresse:</label>
            <input type="text" name="adresse" value="{{ old('adresse') }}" required>

            <label for="telephone">Nouveau Téléphone:</label>
            <input type="text" name="telephone" value="{{ old('telephone') }}" required>

            <!-- Ajouter d'autres champs de formulaire selon vos besoins -->

            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>
@endsection