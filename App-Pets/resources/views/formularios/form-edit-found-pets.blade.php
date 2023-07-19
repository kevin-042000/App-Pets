@extends('layouts.base')

@section('title', 'Found Pets')

@section('content')
<form class="form-create" action="{{ route('found-pets.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <h4>Editar mascota encontrada</h4>
    <div class="input-row">
        <input type="text" name="name" id="name" placeholder="{{ $pet->title }}" required>
        <input type="text" name="location" placeholder="{{ $pet->location }}" id="location">
    </div>

    <div class="input-colum">
        <input type="date" name="date_found" id="date_found" value="{{ $pet->date_found }}" required >
        <textarea name="description" id="description" placeholder="{{ $pet->description }}" required></textarea>        
        <input type="file" name="photo" id="photo">
    </div>
     
    <button type="submit">Guardar</button>
    <a class="button" href="{{ route('found-pets.index') }}">Cancelar</a>
</form>
 
@endsection