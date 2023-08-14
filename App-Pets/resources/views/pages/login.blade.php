@extends('layouts.base')
@section('title','login')
    
@section('content')
{{-- Formulario de login --}}
<form  class="form-register-login" action="{{ route('login.login') }}" method="POST">
    @csrf

    <p>Login</p>

    {{-- campo email --}}
    <input class="input-register-login input-email"  type="email" name="email" id="email" placeholder="Email">
    <span class="error-message email-error alert alert-danger container-register-error"></span>

    {{-- campo contraseña --}}
    <input class="input-register-login input-password"  type="password" name="password" id="password" placeholder="Password"  >
    <span class="error-message  password-error alert alert-danger container-register-error"></span>

    <button type="submit">Iniciar sesión</button>
    <a class="form-link" href="{{route('login.register')}}">No estas registrado?</a>
</form>
@endsection
    

