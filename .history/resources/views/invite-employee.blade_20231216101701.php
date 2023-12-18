<!-- resources/views/invite-employee.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Inviter un Employé</h2>

        {!! Form::open(['route' => 'invitation.send', 'method' => 'post']) !!}
            <div class="form-group">
                {!! Form::label('email', 'Email de l\'employé :') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('company_id', 'Société :') !!}
                {!! Form::select('company_id', $companies->pluck('name', 'id'), null, ['class' => 'form-control', 'required']) !!}
            </div>

            {!! Form::submit('Envoyer l\'invitation', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection