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

    @if($userProfile->bio)
      <div class="container-data-user">
        <div class="container-bio-user">
          <p class="bio-title">BIOGRAFIA</p>
        </div>
        <div class="container-bio-user">
          <p>{{ $userProfile->bio }}</p>
       </div>
    @endif

    @if($userProfile->gender || $userProfile->birthdate)
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
        </ul>   
       </div>
    @endif   
  </div>
</section>
@endsection
