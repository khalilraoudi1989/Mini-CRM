<!-- resources/views/invite-employee.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Inviter un Employé</h2>

        <form action="{{ route('invitations.send') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="email">Email de l'employé :</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="company">Société :</label>
                <select name="company_id" id="company" class="form-control" required>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer l'invitation</button>
        </form>
    </div>
@endsection