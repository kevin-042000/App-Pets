@extends('layouts.base')
@section('title','Perfil')
    
@section('content')
{{-- menu de navegacion --}}
@include('layouts._partials.nav')
    

<section class="container">

    {{-- inicio modal para mostrar formulario--}}

 <!-- Button trigger modal -->
 <div class="container-boton-modal">
    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#form-user-profile">
        Cargar datos del usuario
    </button>
     </div>
      
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
  @if($userProfile && $userProfile->user->id == Auth::user()->id && $userProfile->bio && $userProfile->birthdate && $userProfile->gender && $userProfile->photo)
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
