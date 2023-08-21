@extends('layouts.base')
@section('title', 'Perfil de ' . $userProfile->user->name)

@section('content')
{{-- Menu de navegacion --}}
@include('layouts._partials.nav')

<section class="container">
  <div class="card-profile-user">
    <div class="container-name-user">
        <h5 class="name-user">{{ $userProfile->user->name }}</h5>
    </div>

    @if($userProfile->photo)
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

  <div class="container-btn-profile">

  </div>
  <br>
  </div>
</section>
@endsection
