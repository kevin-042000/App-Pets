@extends('layouts.base')

@section('title', 'Lost Pets')

@section('content')
    <h1>Editar mascota perdida</h1>

    @component('components.form-update')
        @slot('action')
            {{ route('lost-pets.update', $pet->id) }}
        @endslot

        @slot('Vname', $pet->name)
        @slot('Vdescription', $pet->description)
        @slot('Vlocation', $pet->location)
        @slot('VdateLost', $pet->date_lost)
    @endcomponent
@endsection
