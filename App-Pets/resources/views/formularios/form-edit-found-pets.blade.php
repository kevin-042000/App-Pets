@extends('layouts.base')

@section('title', 'Found Pets')

@section('content')

<div class="container-form-edit">
    <form class="foundPetForm" action="{{ route('found-pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <h4>Editar mascota encontrada</h4>
        
        <div class="input-row">
            <input class="validate-title" type="text" name="title" id="title" placeholder="Titulo" value="{{ old('title', $pet->title) }}" >
            <input class="validate-location" type="text" name="location" id="location" placeholder="Ubicacion" value="{{ old('location', $pet->location) }}">
        </div>

        <div class="input-row">
            <span class="title-error error-message alert alert-danger"></span>
            <span class="location-error error-message alert alert-danger"></span>
        </div>
    
        <div class="input-colum">
            <textarea class="validate-description" name="description" id="description" placeholder="Descripcion">{{ old('description', $pet->description) }}</textarea>
            <span class="description-error error-message alert alert-danger"></span>   
        </div>
    
        <div class="input-row">
        
        <input class="validate-date" type="date" name="date_found" id="date_found" value="{{ old('date_found', $pet->date_found ) }}"  >
        
            <input class="file validate-photo" type="file" name="photo" id="photo">
        </div>

        <div class="input-row">
            <span class="error-message date-found-error alert alert-danger"></span>
            <span class="error-message photo-error alert alert-danger"></span>
        </div>
    
        <div class="btn-form-edit">
            <a class="button" href="{{ route('found-pets.index') }}">Cancelar</a>
            <button class="button" type="submit">Guardar</button>
        </div>
    </form>
    

 
@endsection