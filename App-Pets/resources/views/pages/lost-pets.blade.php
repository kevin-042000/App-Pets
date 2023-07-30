{{-- Plantilla base con los link --}}
@extends('layouts.base')

{{-- Titulo de la vista --}}
@section('title','Lost Pets')

{{-- Contenido General --}}
@section('content')
    {{-- Menu de navegacion --}}
    @include('layouts._partials.nav')

    <section class="cont-form">
        {{-- formulario de subir mascotas perdidas --}}
        @include('formularios.form-create-lost-pets')
    </section>

    {{-- Aqui se empieza a ver los datos de animales peridos --}}
    <section class="container">
        @forelse ($LostPets as $LostPet)
            <div class="card mt-3 mb-3 col-6 mx-auto d-block">
                <div class="card-header">
                    <div class="user-info d-flex align-items-center">
                        <a href="{{ route('user-profile.showOwn', $LostPet->user->id) }}">
                            @if($LostPet->user->profile && $LostPet->user->profile->photo)
                                <img src="{{ asset('storage/images/' . $LostPet->user->profile->photo) }}" alt="Foto de perfil de usuario">
                            @endif
                            {{ $LostPet->user->name }}
                        </a>
                    </div>
                </div>

                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <div class="container-h3">
                        <h3 class="card-title d-flex justify-content-center align-items-center pt-2">
                            Se perdio {{ $LostPet->name }}
                        </h3>
                    </div>
                    <div class="mb-1">
                        <p>{{ $LostPet->description }}</p>
                    </div>
                    <div class="mb-1">
                        <p>Se perdio en: {{ $LostPet->location }}</p>
                    </div>
                    <div class="mb-1">
                        <p>Fecha en la que se perdio: {{ \Carbon\Carbon::parse($LostPet->date_lost)->format('d/m/Y') }}</p>
                    </div>

                    {{-- el if comprueba si existe una img, si existe la muestra --}}
                    @if ($LostPet->photo && file_exists(public_path('storage/images/'.$LostPet->photo)))
                        <div class="mb-1">
                            <img class="card-img" src="{{ asset('storage/images/'.$LostPet->photo) }}" alt="img de la mascota">
                        </div>
                    @endif

    
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-center align-items-center">



                    {{-- Verifica si el usuario está autenticado y verificar si el usuario actual
                    tiene permisos para editar la mascota perdida específica.
                    si tiene permiso se muestran los botones --}}
                   
                    @auth
                        @if( Auth::user()->id == $LostPet->user_id)
                            <a class="btn-edit" href="{{ route('lost-pets.edit', $LostPet->id) }}">Editar</a>
                            <form method="POST" action="{{ route('lost-pets.destroy', $LostPet->id) }}">
                                @method('DELETE')
                                @csrf
                                <input class="btn-delete" type="submit" value="Eliminar">
                            </form>
                        @endif
                    @endauth
                </div>


                <div class="comentario">
                    @include('formularios.create-comment-lost-pets') 
               
                
                    <h3>Comentarios:</h3>
                    @if($LostPet->lostPetComments)
    @foreach($LostPet->lostPetComments as $comment)
        <div class="comment">
            <p>{{ $comment->body }}</p>
            <small>Comentado por: {{ $comment->user->name }}</small>
        </div>
    @endforeach
@endif
                </div>

              


                
        @empty
            <div class="container-no-mascota">
                <p class="no-hay-mascota">No hay mascotas perdidas</p>   
            </div>         
        @endforelse
    </section>
@endsection
