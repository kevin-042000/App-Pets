@extends('layouts.base')
@section('title','Perfil')
    
@section('content')
{{-- menu de navegacion --}}
@include('layouts._partials.nav')

{{-- Se incluye el formulario de subir datos --}}
@include('formularios.form-create-user-profile')
 
<section class="container">
<div class="card mt-3 mb-3 col-6 mx-auto d-block" >
    @if($user->profile && $user->profile->photo)
    <img src="{{ asset('storage/images/' . $user->profile->photo) }}" class="card-img-top" alt="User Photo">
    @endif
    <div class="card-body">
      <h5 class="card-title">{{ $user->name }}</h5>

      @if($user->profile && $user->profile->bio)
      <p class="card-text">{{ $user->profile->bio }}</p>
      @endif

      <ul class="list-group list-group-flush">
        @if($user->profile && $user->profile->gender)
        <li class="list-group-item">Gender: {{ $user->profile->gender }}</li>
        @endif

        @if($user->profile && $user->profile->birthdate)
        <li class="list-group-item">Birthdate: {{ $user->profile->birthdate }}</li>
        @endif
      </ul>
    </div>

    <div class="card-footer d-flex justify-content-center align-items-center">
        {{-- Verifica si el usuario está autenticado y verificar si el usuario actual
        tiene permisos para editar la mascota perdida específica.
        si tiene permiso se muestran los botones --}}
       
       
        @auth
        @if($user->id == Auth::user()->id && $user->profile && ($user->profile->bio || $user->profile->birthdate || $user->profile->gender || $user->profile->photo))
            <a class="btn-edit" href="{{ route('user-profile.edit', $user->id) }}">Editar</a>
            <form method="POST" action="{{ route('user-profile.destroy', $user->id) }}">
                @method('DELETE')
                @csrf
                <input class="btn-delete" type="submit" value="Eliminar">
            </form>
        @endif
    @endauth

      
     

    </div>
</div>
</section>


  

@endsection