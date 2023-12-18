<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tableau de bord Administrateur</h1>

        <!-- Contenu spécifique au tableau de bord de l'administrateur -->
        <p>Bienvenue, {{ Auth::user()->name }}!</p>
        <!-- Autres éléments du tableau de bord -->

        <a href="{{ route('admin.create') }}">Créer un nouvel administrateur</a>
    </div>
@endsection