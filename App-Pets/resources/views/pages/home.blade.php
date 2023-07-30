@extends('layouts.base')
@section('title','Home')
    
@section('content')
{{-- Menu de navegacion --}}
@include('layouts._partials.nav')

{{-- Aqui se empieza a ver los datos de animales peridos --}}
@section('content')
<section class="container">
    {{-- Mensaje por si no hay publiciones --}}
    @if ($message)
        <div class="container-no-mascota">
            <p class="no-hay-mascota">{{ $message }}</p>
        </div>
    @else
        {{-- Mostrar todas las mascotas ordenadas por fecha --}}
        @foreach ($SortedPets as $pet)
            <div class="card mt-3 mb-3 col-6 mx-auto d-block">
                <div class="card-header">
                    <div class="user-info d-flex align-items-center">
                        <a href="{{ route('user-profile.showOwn', $pet->user->id) }}">
                            @if($pet->user->profile && $pet->user->profile->photo)
                                <img src="{{ asset('storage/images/' . $pet->user->profile->photo) }}" alt="Foto de perfil de usuario">
                            @endif
                            {{ $pet->user->name }}
                        </a>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <div class="container-h3">
                    <h3 class="card-title d-flex justify-content-center align-items-center pt-2">
                        {{ $pet instanceof App\Models\LostPet ? 'Se perdió' : 'Titulo: ' }}
                        {{ $pet->name ?? $pet->title }}
                    </h3>
                    </div>
                    <div class="mb-1">
                        <p>{{ $pet->description }}</p>
                    </div>
                    <div class="mb-1">
                        <p>{{ $pet instanceof App\Models\LostPet ? 'Se perdió en' : 'Se encontró en' }}:
                            {{ $pet->location }}</p>
                    </div>
                    <div class="mb-1">
                        <p>{{ $pet instanceof App\Models\LostPet ? 'Fecha en la que se perdió:' : 'Fecha en la que se encontró:' }}
                            {{ \Carbon\Carbon::parse($pet->date_lost ?? $pet->date_found)->format('d/m/Y') }}</p>
                    </div>
                    {{-- el if comprueba si existe una img, si existe la muestra --}}
                    @if ($pet->photo && file_exists(public_path('storage/images/'.$pet->photo)))
                        <div class="mb-1">
                            <img class="card-img" src="{{ asset('storage/images/'.$pet->photo) }}" alt="img de la mascota">
                        </div>
                    @endif
                </div>

                <div class="card-footer d-flex justify-content-center align-items-center">
                    {{-- Verifica si el usuario está autenticado y verificar si el usuario actual
                    tiene permisos para editar la mascota perdida específica.
                    si tiene permiso se muestran los botones --}}
                    @auth
                        @if(Auth::user()->id === $pet->user_id)
                            <a class="btn-edit" href="{{ $pet instanceof App\Models\LostPet ? route('lost-pets.edit', $pet->id) : route('found-pets.edit', $pet->id) }}">Editar</a>
                            <form method="POST" action="{{ $pet instanceof App\Models\LostPet ? route('lost-pets.destroy', $pet->id) : route('found-pets.destroy', $pet->id) }}">
                                @method('DELETE')
                                @csrf
                                <input class="btn-delete" type="submit" value="Eliminar">
                            </form>
                        @endif
                    @endauth
                </div>
            
            <!-- Mostrar detalles de la publicación aquí -->
            <div class="comentario">
                @if(get_class($pet) === 'App\Models\LostPet')
                    @include('formularios.create-comment-lost-pets') 
        
                    @if($pet->lostPetComments->isNotEmpty())
                        <h3>Comentarios:</h3>
                        @foreach($pet->lostPetComments as $comment)
                            <div class="comment">
                                <p>{{ $comment->body }}</p>
                                <small>Comentado por: {{ $comment->user->name }}</small>
                            </div>
                        @endforeach
                    @endif
                @elseif(get_class($pet) === 'App\Models\FoundPet')
                    @include('formularios.create-comment-found-pet') 
        
                    @if($pet->foundPetComments->isNotEmpty())
                        <h3>Comentarios:</h3>
                        @foreach($pet->foundPetComments as $comment)
                            <div class="comment">
                                <p>{{ $comment->body }}</p>
                                <small>Comentado por: {{ $comment->user->name }}</small>
                            </div>
                        @endforeach
                    @endif
                @endif
            </div>
        </div> <!-- Final del card -->
        @endforeach
       
    @endif
</section>
@endsection

