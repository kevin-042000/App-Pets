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
        <input type="date" name="date_lost" id="date_lost" required value="{{ $pet->date_lost }}">
        <textarea name="description" id="description" required>{{ $pet->description }}</textarea>        
        <input type="file" name="photo" id="photo">
    </div>
        
    <button type="submit">Guardar</button>
    <a class="button" href="{{ route('lost-pets.index') }}">Cancelar</a>
</form>


@endsection
