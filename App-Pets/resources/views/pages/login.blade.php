@extends('layouts.base')
@section('title','login')
    
@section('content')
{{-- Formulario de login --}}
<form  class="form-register-login" action="{{ route('login.login') }}" method="POST">
    @csrf

    <p>Login</p>
    <input class="input-register-login"  type="email" name="email" id="email" placeholder="Email" required>
    <input class="input-register-login"  type="password" name="password" id="password" placeholder="Password" required>
    <button type="submit">Iniciar sesión</button>
    <a class="form-link" href="{{route('login.register')}}">No estas registrado?</a>
</form>
@endsection
    

