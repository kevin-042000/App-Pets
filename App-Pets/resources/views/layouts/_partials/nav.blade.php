<nav id="myNavbar" class="menu">
    <div class="menu-content">
        <ul>
            <!-- Si la ruta actual es "home.index", se agregará la clase "active" al <li>. -->
            <li class="{{ Request::routeIs('home.index') ? 'active list' : 'list' }}">
                <a href="{{ route('home.index') }}">Inicio</a>
            </li>
            
            <!-- Lo mismo se aplica aquí para "lost-pets.index". -->
            <li class="{{ Request::routeIs('lost-pets.index') ? 'active list' : 'list' }}">
                <a href="{{ route('lost-pets.index') }}">Perdidas</a>
            </li>
        
            <!-- ... y así sucesivamente para los demás enlaces. -->
            <li class="{{ Request::routeIs('found-pets.index') ? 'active list' : 'list' }}">
                <a href="{{ route('found-pets.index') }}">Encontradas</a>
            </li>
        
            <li class="{{ Request::routeIs('info.index') ? 'active list' : 'list' }}">
                <a href="{{ route('info.index') }}">Info</a>
            </li>
        
            <li class="{{ Request::routeIs('user-profile.showOwn') ? 'active list' : 'list' }}">
                <a href="{{ route('user-profile.showOwn') }}" class="profile-link">
                   {{-- comprueba si existe una foto de perfil y si existe la muestra --}}
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
     
     <form action="{{ route('login.logout') }}" method="POST">
         @csrf
         <button class="logout-button" type="submit"> 
            {{-- comprueba si existe una foto de perfil y si existe la muestra --}}
            @if(Auth::user()->profile && Auth::user()->profile->photo)
            <img src="{{ asset('storage/images/' . Auth::user()->profile->photo) }}" alt="User Photo" class="user-photo">
            @endif
        {{-- Muestra el nombre del usuario --}}
        <span class="d-none d-lg-inline">Cerrar sesión de {{ Auth::user()->name }}</span>
        <span class="d-inline d-lg-none">Cerrar sesión</span>
        </button>
     </form>
 </div>
 @endauth

</nav>