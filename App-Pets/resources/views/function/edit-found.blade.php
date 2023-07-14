@extends('layouts.base')

@section('title', 'Found Pets')

@section('content')
    <h1>Editar mascota encontrada</h1>

    @component('components.form-update')
        @slot('action')
            {{ route('found-pets.update', $pet->id) }}
        @endslot

        @slot('Vname', $pet->name)
        @slot('Vdescription', $pet->description)
        @slot('Vlocation', $pet->location)
        @slot('VdateLost', $pet->date_lost)
    @endcomponent
@endsection