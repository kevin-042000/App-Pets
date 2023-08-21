@extends('layouts.base')
@section('title','Registro')
    
@section('content')
{{-- Formulario de registro --}}
<form class="form-register-login" action="{{ route('login.register') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <p>Registro</p>

    <!-- Campo Nombre -->
    <input class="input-register-login input-name" type="text" name="name" placeholder="Nombre">
    <div class="error-message name-error alert alert-danger container-register-error"></div>

    <!-- Campo Email -->
    <input class="input-register-login input-email" type="email" name="email" placeholder="Correo electrónico">
    <div class="error-message email-error alert alert-danger container-register-error"></div>
    @if ($errors->has('email'))
    <div class="alert alert-danger container-register-error">{{ $errors->first('email') }}</div>
     @endif

    <!-- Campo Contraseña -->
    <input class="input-register-login input-password" type="password" name="password" placeholder="Contraseña"  autocomplete="new-password">
    <div class="error-message password-error alert alert-danger container-register-error"></div>

    <!-- Campo Confirmación de Contraseña -->
    <input class="input-register-login input-password-confirmation" type="password" name="password_confirmation" placeholder="Confirmar contraseña"  autocomplete="new-password">
    <div class="error-message password-confirmation-error alert alert-danger container-register-error" ></div>    

    <!-- Botón de registro -->
    <button type="submit">Registrarse</button>

    <!-- Enlace a login -->
    <a class="form-link" href="{{route('login.login')}}">Ya tienes una cuenta?</a>
</form>
   
 
@endsection

    

