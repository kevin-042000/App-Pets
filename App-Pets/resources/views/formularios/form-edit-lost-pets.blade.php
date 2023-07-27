@extends('layouts.base')

@section('title', 'Lost Pets')

@section('content')
<form class="form-create" action="{{ route('lost-pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf 
        
    <h4>Edita tu publicacion de mascota perdida</h4>
    <div class="input-row">
        <input type="text" name="name" id="name" value="{{ $pet->name }}" required>
        <input type="text" name="location" value="{{ $pet->location }}" id="location">
    </div>

    <div class="input-colum">
        <textarea name="description" id="description" required>{{ $pet->description }}</textarea>        
    </div>

    <div class="input-row">
        <input type="date" name="date_lost" id="date_lost" required value="{{ $pet->date_lost }}">
        <input class="file" type="file" name="photo" id="photo">
    </div>
    
    <div class="btn-form-edit">
        <a class="button" href="{{ route('lost-pets.index') }}">Cancelar</a>
        <button class="button" type="submit">Guardar</button>
    </div>
   
</form>


@endsection
