@extends('layouts.base')

@section('title', 'Found Pets')

@section('content')
<form class="form-create" action="{{ route('found-pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <h4>Editar mascota encontrada</h4>
    <div class="input-row">
        <input type="text" name="title" id="name" value="{{ $pet->title }}" required>
        <input type="text" name="location" value="{{ $pet->location }}" id="location">
    </div>

    <div class="input-colum">
        <textarea name="description" id="description" required>{{ $pet->description }}</textarea>        
    </div>

    <div class="input-row">
        <input type="date" name="date_found" id="date_found" value="{{ $pet->date_found }}" required >
        <input class="file" type="file" name="photo" id="photo">
    </div>


     <div class="btn-form-edit">
    <a class="button" href="{{ route('found-pets.index') }}">Cancelar</a>
    <button  class="button" type="submit">Guardar</button>
     </div>
</form>

 
@endsection