{{-- Plantilla base con los link --}}
@extends('layouts.base')

{{-- Titulo de la vista --}}
@section('title','Lost Pets')

{{-- Contenido General --}}
@section('content')
    {{-- Menu de navegacion --}}
    @include('layouts._partials.nav')

  


    {{-- Aqui se empieza a ver los datos de animales peridos --}}
    <section class="container">

          {{-- inicio modal  para mostrar formulario--}}

 <!-- Button trigger modal -->
 <div class="container-boton-modal">
<button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#formulario-mascota-perdida">
    Cargar una mascota perdida
</button>
 </div>
  
<!-- Modal -->
<div class="modal fade" id="formulario-mascota-perdida" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cargar mascotas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    {{-- formulario de subir mascotas perdidas --}}
                    @include('formularios.form-create-lost-pets')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

    {{-- fin modal --}}


        @forelse ($LostPets as $LostPet)
            <div class="card mt-3  col-6 mx-auto d-block">
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
            </div>

                <div class="containter-comentarios">
                    @include('formularios.create-comment-lost-pets') 

                    @if($LostPet->lostPetComments->isNotEmpty())
                    <div class="comentario">
                        <div class="title-comment">
                            <h3>Comentarios</h3>
                        </div>

                       @if($LostPet->lostPetComments)
                       @foreach($LostPet->lostPetComments as $comment)
                    
                        <div class="comment">
                            <small>
                            @if($comment->user->profile && $comment->user->profile->photo)
                                <img src="{{ asset('storage/images/' . $comment->user->profile->photo) }}" alt="User Photo" class="user-photo">
                            @endif 
                            {{ $comment->user->name }}
                            </small>
                            <div class="paraffo-destroy">
                            <p class="paragraph">{{ $comment->body }}</p>
                            <div class="comment-destroy">
                                <form method="POST" action="{{ route('comments.destroy', ['type' => $type, 'comment' => $comment->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </div>
                            </div>
                        </div>
                    

                       @endforeach
                       @endif
                    </div>

                    @endif
            </div>
              



              

           
                
        @empty
            <div class="container-no-mascota">
                <p class="no-hay-mascota">No hay mascotas perdidas</p>   
            </div>         
        @endforelse
    </section>
@endsection
