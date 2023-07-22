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
        <a href="{{ route('user-profile.index') }}">
           {{-- <img> --}}
           Perfil
       </a> 
   </li>
 </ul>
 </div>


 @auth
 <div class="logout-container">
    <form class="logout-button" action="{{ route('login.logout') }}" method="POST">
        @csrf
        <button type="submit"> Cerrar sesión de {{ Auth::user()->name }}</button>
    </form>
 </div>
@endauth


</nav>