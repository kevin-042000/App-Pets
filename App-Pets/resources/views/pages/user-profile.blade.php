@extends('layouts.base')
@section('title','Perfil')
    
@section('content')
{{-- menu de navegacion --}}
@include('layouts._partials.nav')

{{-- Se incluye el formulario de subir datos --}}
@include('formularios.form-create-user-profile')
 
<section class="container">
  <div class="card-profile-user">

    <div class="container-name-user">
        <h5 class="name-user">{{ $user->name }}</h5>
    </div>

    <div class="container-img-user">
        @if($user->profile && $user->profile->photo)
          <img src="{{ asset('storage/images/' . $user->profile->photo) }}" class="card-img-top" alt="User Photo">
        @endif
   </div>
   
      <div class="container-data-user">
        <div class="container-bio-user">
          <p class="bio-title">BIOGRAFIA</p>
        </div>
        <div class="container-bio-user">
          @if($user->profile && $user->profile->bio)
          <p>{{ $user->profile->bio }}</p>
          @endif
       </div>

       <div class="container-gender-birthdate">
        @if($user->profile && ($user->profile->gender || $user->profile->birthdate))
        <h5>DATOS PERSONALES</h2>
        <ul>
          @if($user->profile && $user->profile->birthdate)
        <li>
          <p>Nacio el {{ \Carbon\Carbon::parse($user->profile->birthdate)->format('d-m-Y') }}</p>
        </li>
        @endif

          @if($user->profile && $user->profile->gender)
          <li>
            <p> El genero de {{ $user->name }} es {{ $user->profile->gender }}</p>
          </li>
        @endif

        </ul>
        @endif      
       </div>

      </div>
      
    

  
        {{-- Verifica si el usuario está autenticado y verificar si el usuario actual
        tiene permisos para editar la mascota perdida específica.
        si tiene permiso se muestran los botones --}}
       
       <div class="container-btn-profile">
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