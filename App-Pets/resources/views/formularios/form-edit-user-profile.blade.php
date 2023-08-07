@extends('layouts.base')

@section('title', 'Perfil')

@section('content')
<form class="form-create" action="{{ route('user-profile.update', $userProfile->user_id ?? Auth::user()->id) }}" method="POST" enctype="multipart/form-data">


    @method('PUT')

    @csrf
 
 
    <h4>Subir datos</h4>

    <div class="input-row">
        <select name="gender" id="gender" >
          <option value="">Selecciona tu genero</option>
          <option value="masculino" {{ old('gender', $userProfile->gender ?? '') === 'masculino' ? 'selected' : '' }}>Masculino</option>
          <option value="femenino" {{ old('gender', $userProfile->gender ?? '') === 'femenino' ? 'selected' : '' }}>Femenino</option>
        </select>
        <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', $userProfile->birthdate ?? '') }}"  placeholder="Fecha de nacimiento">     
    </div>

    <div class="input-colum">
        <textarea name="bio" id="bio" required>{{ old('bio', $userProfile->bio ?? '') }}</textarea>
        <input type="file" name="photo" id="photo">        
    </div>

    <div class="input-row">
        <!-- Input para el correo electrónico -->
        <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $userProfile->contact_email ?? '') }}" placeholder="Correo de contacto" >
        <!-- Input para el número de teléfono/celular -->
        <input type="tel" id="contact_number" name="contact_number" value="{{ old('contact_number', $userProfile->contact_number ?? '') }}"  placeholder="Numero de contacto" >
    </div>

    <div class="btn-form-edit">
        <a class="button" href="{{ route('user-profile.showOwn') }}">Cancelar</a>
        <button class="button" type="submit">Guardar</button>
    </div>
</form>
@endsection


