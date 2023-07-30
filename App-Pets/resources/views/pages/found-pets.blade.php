@extends('layouts.base')
@section('title','Found Pets')
    
@section('content')
{{-- menu de navegacion --}}
@include('layouts._partials.nav')
{{-- Formulario de carga de mascotas encontradas --}}
<section class="cont-form">
{{-- formulario de subir mascotas encontradas --}}
@include('formularios.form-create-found-pets')
</section>

@section('content')
<section class="container">
    @forelse ($FoundPets as $FoundPet)
        <div class="card mt-3 mb-3 col-6 mx-auto d-block">
            <div class="card-header">
                <div class="user-info d-flex align-items-center">
                    <a href="{{ route('user-profile.showOwn', $FoundPet->user->id) }}">
                        @if($FoundPet->user->profile && $FoundPet->user->profile->photo)
                            <img src="{{ asset('storage/images/' . $FoundPet->user->profile->photo) }}" alt="Foto de perfil de usuario">
                        @endif
                        {{ $FoundPet->user->name }}
                    </a>
                </div>
            </div>

            <div class="card-body d-flex justify-content-center align-items-center flex-column">
                <div class="container-h3">
                    <h3 class="card-title d-flex justify-content-center align-items-center pt-2">
                        {{ $FoundPet->title }}
                    </h3>
                </div>
                <div class="mb-1">
                    <p>{{ $FoundPet->description }}</p>
                </div>
                <div class="mb-1">
                    <p>Se encontro en: {{ $FoundPet->location }}</p>
                </div>
                <div class="mb-1">
                    <p>Fecha en la que se encontro: {{ \Carbon\Carbon::parse($FoundPet->date_found)->format('d/m/Y') }}</p>
                </div>
                {{-- el if comprueba si existe una img, si existe la muestra --}}
                @if ($FoundPet->photo && file_exists(public_path('storage/images/'.$FoundPet->photo)))
                    <div class="mb-1">
                        <img class="card-img" src="{{ asset('storage/images/'.$FoundPet->photo) }}" alt="img de la mascota">
                    </div>
                @endif
            </div>

            <div class="card-footer d-flex justify-content-center align-items-center">
                {{-- Verifica si el usuario está autenticado y verificar si el usuario actual
                tiene permisos para editar la mascota perdida específica.
                si tiene permiso se muestran los botones --}}
                @auth
                @if( Auth::user()->id == $FoundPet->user_id)
                    <a class="btn-edit" href="{{ route('found-pets.edit', $FoundPet->id) }}">Editar</a>
                    <form method="POST" action="{{ route('found-pets.destroy', $FoundPet->id) }}">
                        @method('DELETE')
                        @csrf
                        <input class="btn-delete" type="submit" value="Eliminar">
                    </form>
                @endif
                @endauth
            </div>
        </div>

        <div class="comentario">
            @include('formularios.create-comment-found-pet') 
       
        
            <h3>Comentarios:</h3>
            @if($FoundPet->foundPetComments)
            @foreach($FoundPet->foundPetComments as $comment)
                <div class="comment">
                    <p>{{ $comment->body }}</p>
                    <small>Comentado por: {{ $comment->user->name }}</small>
                </div>
            @endforeach
        @endif
        </div>
        
    @empty
        <div class="container-no-mascota">
            <p class="no-hay-mascota">No hay mascotas encontradas</p>   
        </div>         
    @endforelse
</section>
@endsection
