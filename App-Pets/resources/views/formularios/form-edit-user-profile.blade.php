@extends('layouts.base')

@section('title', 'Perfil')

@section('content')

<form class="form-create" action="{{ route('user-profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    
    <h4>Subir datos</h4>
    <div class="input-row">
        <input type="gender" name="gender" id="gender" value="{{ $user->gender }}" required>
        <input type="date" name="birthdate" id="birthdate" required value="{{ $user->birthdate }}">     
    </div>

    <div class="input-colum">
        <textarea name="bio" id="bio" value="{{ $user->bio }}" required></textarea>
        <input type="file" name="photo" id="photo">        
    </div>
    
    <button type="submit">Guardar</button>
</form>

@endsection