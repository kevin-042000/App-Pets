@extends('layouts.base')
@section('title','registro')
    
@section('content')
{{-- Formulario de registro --}}
<form class="form-register-login" action="{{ route('login.register') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <p>Registro</p>
    <input class="input-register-login" type="text" name="name" id="name" placeholder="Nombre" required>
    <input class="input-register-login" type="email" name="email" id="email" placeholder="Correo electrónico" required>
    <input class="input-register-login" type="password" name="password" id="password" placeholder="Contraseña" required autocomplete="new-password">
    <input class="input-register-login" type="password" name="password_confirmation" id="Password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
   
    
{{-- 
    <div>
        <label for="photo">Foto:</label>
        <input type="file" name="photo" id="photo">
    </div> --}}

    <button type="submit">Registrarse</button>

     <a class="form-link" href="{{route('login.login')}}">Ya tienes una cuenta?</a>
</form>    

@endsection

    

