@extends('layouts.base')
@section('title','Perfil')
    
@section('content')
{{-- menu de navegacion --}}
@include('layouts._partials.nav')
     

<section class="container">

    {{-- inicio modal para mostrar formulario--}}
   
 <!-- Button trigger modal -->
 @auth
 @if(!$userProfile || (!$userProfile->bio && !$userProfile->photo && !$userProfile->gender && !$userProfile->birthdate && !$userProfile->contact_number && !$userProfile->contact_email))
     <div class="container-boton-modal">
         <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#form-user-profile">
             Cargar datos del usuario
         </button>
     </div>
 @endif
 @endauth 
 
      
    <!-- Modal  -->
    @include('components.modal-create-user-profile')
    {{-- fin modal --}}

    {{-- mostrar datos del usuario --}}
  <div class="card-profile-user">
    <div class="container-name-user">
      <h5 class="name-user">{{ Auth::user()->name }}</h5>
    </div>

    @if($userProfile && $userProfile->photo)
        <div class="container-img-user">
            <img src="{{ asset('storage/images/' . $userProfile->photo) }}" class="card-img-top" alt="User Photo">
        </div>
    @endif

    @if($userProfile && $userProfile->bio || $userProfile->gender || $userProfile->birthdate || $userProfile->contact_number || $userProfile->contact_email)
        <div class="container-data-user">
            @if($userProfile && $userProfile->bio)
            <div class="container-bio-user">
                <h5 class="bio-title">BIOGRAFIA</h5>
            </div>
            <div class="container-bio-user-p">
                <p>{{ $userProfile->bio }}</p>
            </div>
            @endif

            @if($userProfile && ($userProfile->gender || $userProfile->birthdate || $userProfile->contact_number || $userProfile->contact_email))
            <div class="container-gender-birthdate">
                 <h5>DATOS PERSONALES</h5>
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
        
                     @if($userProfile->contact_number)
                         <li>
                             <p> Numero de contacto: {{ $userProfile->contact_number }}</p>
                         </li>
                     @endif
        
                     @if($userProfile->contact_email)
                         <li>
                             <p> Correo electronico de contacto:  {{ $userProfile->contact_email }}</p>
                         </li>
                     @endif
                 </ul>   
            </div>
            @endif
        </div>
        @endif
   

   

    @auth
    @if($userProfile && $userProfile->user->id == Auth::user()->id)
        @if($userProfile->bio || $userProfile->birthdate || $userProfile->gender || $userProfile->contact_email || $userProfile->contact_number || $userProfile->photo)
            <div class="container-btn-profile">
                <a class="btn-edit" href="{{ route('user-profile.edit', $userProfile->id) }}">         
                    EDITAR
                </a>
                <form method="POST" action="{{ route('user-profile.destroy', $userProfile->id) }}">
                    @method('DELETE')
                    @csrf
                    <button class="btn-delete" type="submit">
                      ELIMINAR
                    </button>
                </form>
            </div>
        @endif
    @endif
    @endauth 
  

  </div>


  
      
   
</section>
@endsection
