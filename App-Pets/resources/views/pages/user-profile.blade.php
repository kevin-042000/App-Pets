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
      <h5 class="name-user">{{ Auth::user()->name }}</h5>
    </div>

    @if($userProfile && $userProfile->photo)
        <div class="container-img-user">
            <img src="{{ asset('storage/images/' . $userProfile->photo) }}" class="card-img-top" alt="User Photo">
        </div>
    @endif

    @if($userProfile && $userProfile->bio)
        <div class="container-data-user">
            <div class="container-bio-user">
                <p class="bio-title">BIOGRAFIA</p>
            </div>
            <div class="container-bio-user">
                <p>{{ $userProfile->bio }}</p>
            </div>
    @endif
    @if($userProfile && ($userProfile->gender || $userProfile->birthdate))
    <div class="container-gender-birthdate">
         <h5>DATOS PERSONALES</h2>
         <ul>
             @if($userProfile->birthdate)
                 <li>
                     <p>Nacio el {{ \Carbon\Carbon::parse($userProfile->birthdate)->format('d-m-Y') }}</p>
                 </li>
             @endif
 
             @if($userProfile->gender)
                 <li>
                     <p> El genero de {{ $userProfile->user->name }} es {{ $userProfile->gender }}</p>
                 </li>
             @endif
         </ul>   
    </div>
 @endif
  </div>



 @auth
 @if($userProfile && $userProfile->user->id == Auth::user()->id)
    <div class="container-btn-profile">
         <a class="btn-edit" href="{{ route('user-profile.edit', $userProfile->user->id) }}">         
           EDITAR
         </a>
         <form method="POST" action="{{ route('user-profile.destroy', $userProfile->user->id) }}">
             @method('DELETE')
             @csrf
             <button class="btn-delete" type="submit">
               ELIMINAR
             </button>
         </form>
     </div>
 @endif
 @endauth

  </div>
      
   
</section>
@endsection
