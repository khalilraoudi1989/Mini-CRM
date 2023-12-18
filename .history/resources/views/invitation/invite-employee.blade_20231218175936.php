<!-- resources/views/invite-employee.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Invite an Employee</h2>

        {!! Form::open(['route' => 'invitation.send', 'method' => 'post']) !!}
            <div class="form-group">
                {!! Form::label('email', 'Employee email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Employee name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('company_id', 'Company:') !!}
                {!! Form::select('company_id', $companies->pluck('name', 'id'), null, ['class' => 'form-control', 'required']) !!}
            </div>

            {!! Form::submit('Envoyer l\'invitation', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection