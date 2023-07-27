<nav class="menu">
    <div class="menu-content">
 <ul>
    <li>
        <a href="{{ route('home.index') }}">
          <img src="{{ asset('icons-App-Pets/casa-de-perro.png') }}" alt="Icono de inicio">
        Inicio
        </a> 
    </li>
    <li>
        <a href="{{ route('lost-pets.index') }}">
            <img src="{{ asset('icons-App-Pets/huella.png') }}" alt="Icono de inicio">
            Perdidas
        </a>
    </li>
    <li>
        <a href="{{ route('found-pets.index') }}">
        <img src="{{ asset('icons-App-Pets/ubicacion.png') }}" alt="Icono de inicio">
            Encontradas
        </a>
    </li>
    <li>
         <a href="{{ route('info.index') }}">
            <img src="{{ asset('icons-App-Pets/informacion.png') }}" alt="Icono de inicio">
            Info
        </a> 
    </li>
    <li>
        <a href="{{ route('user-profile.showOwn') }}" class="profile-link">
           {{-- comprueba si existe una foto de perfil y si existe la muestra --}}
        {{-- @if(Auth::user()->profile && Auth::user()->profile->photo)
        <img src="{{ asset('storage/images/' . Auth::user()->profile->photo) }}" alt="User Photo" class="user-photo">
        @endif --}}
        @if(Auth::check() && Auth::user()->profile && Auth::user()->profile->photo)
    <img src="{{ asset('storage/images/' . Auth::user()->profile->photo) }}" alt="User Photo" class="user-photo">
@endif
        <span>Perfil</span>
       </a> 
   </li>
 </ul>
 </div>

{{-- boton de cerrar session --}}
 @auth
 <div class="logout-container">
     
     <form class="logout-button" action="{{ route('login.logout') }}" method="POST">
         @csrf
         <button class="logout-button" type="submit"> 
            {{-- comprueba si existe una foto de perfil y si existe la muestra --}}
            @if(Auth::user()->profile && Auth::user()->profile->photo)
            <img src="{{ asset('storage/images/' . Auth::user()->profile->photo) }}" alt="User Photo" class="user-photo">
            @endif
        {{-- Muestra el nombre del usuario --}}
         Cerrar sesión de {{ Auth::user()->name }}
        </button>
     </form>
 </div>
 @endauth


</nav>