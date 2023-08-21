@extends('layouts.base')

@section('title', 'Perfil')

@section('content')
<div class="container-form-edit">
<form class="form-perfile-user" action="{{ route('user-profile.update', $userProfile->user_id ?? Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
 
    <h4>Actualizar Datos</h4>

    <div class="input-row">
        <select name="gender" id="gender">
            <option value="">Selecciona tu género</option>
            <option value="masculino" {{ ($userProfile->gender ?? '') === 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="femenino" {{ ($userProfile->gender ?? '') === 'femenino' ? 'selected' : '' }}>Femenino</option>
        </select>
        
        <input type="date" name="birthdate" id="birthdate" value="{{ $userProfile->birthdate ?? '' }}" placeholder="Fecha de nacimiento">

    </div>

 
    <div class="input-row">
        <input type="email" id="contact_email" name="contact_email" value="{{ $userProfile->contact_email ?? '' }}" placeholder="Correo de contacto">
        <input type="tel" id="contact_number" name="contact_number" value="{{ $userProfile->contact_number ?? '' }}" placeholder="Numero de contacto">
    </div>

    <div class="input-row">
        <span class="contact-email-error error-message alert alert-danger message-profile"></span>
        <span class="contact-number-error error-message alert alert-danger message-profile"></span>
    </div>

    <div class="input-colum">
        <textarea name="bio" id="bio" placeholder="Biografía">{{ $userProfile->bio ?? '' }}</textarea>
        <span class="bio-error error-message alert alert-danger"></span>

        <input type="file" name="photo" id="photo">
        <span class="error-message photo-error"></span>
    </div>
  
    <div class="btn-form-edit">
        <a class="button" href="{{ route('user-profile.showOwn') }}">Cancelar</a>
        <button class="button" type="submit">Guardar</button>
    </div>
</form>
</div>
@endsection


