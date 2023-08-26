@extends('layouts.base')

@section('title', 'Lost Pets')

@section('content')
<div class="container-form-edit">
<form class="lostPetForm" action="{{ route('lost-pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf 
        
    <h4>Edita tu publicacion de mascota perdida</h4>
    <div class="input-row">
        <input class="validate-name" type="text" name="name" id="name" value="{{ $pet->name }}"  placeholder="Nombre">
        <input class="validate-location" type="text" name="location" value="{{ $pet->location }}" placeholder="Ubicacion" id="location">
    </div>

    <div class="input-row">
        <span class="error-message name-error alert alert-danger message-pet"></span>
        <span class="error-message location-error alert alert-danger message-pet"></span>
    </div>

    <div class="input-colum">
        <textarea class="validate-description" name="description" id="description" placeholder="Description">{{ $pet->description }}</textarea>   
        <span class="error-message description-error alert alert-danger"></span>     
    </div>

    <div class="input-row">
        <input class="validate-date" type="date" name="date_lost" id="date_lost" required value="{{ $pet->date_lost }}">
        <input class="file validate-photo" type="file" name="photo" id="photo">
    </div>

    <div class="input-row">
        <span class="error-message date-error alert alert-danger"></span>
        <span class="error-message photo-error alert alert-danger"></span>
    </div>
    
    <div class="btn-form-edit">
        <a class="button" href="{{ route('lost-pets.index') }}">Cancelar</a>
        <button class="button" type="submit">Guardar</button>
    </div>
   
</form>
</div>
@endsection
