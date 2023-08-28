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

{{-- inicio modal para mostrar formulario--}}

 <!-- Button trigger modal -->
 <div class="container-boton-modal">
<button type="button" class="btn btn-primary  openModalButton" data-bs-toggle="modal" data-bs-target="#formulario-mascota-perdida">
    Cargar una mascota perdida
</button>
 </div>
  
<!-- Modal  -->
@include('components.modal-create-lost-pets')
{{-- fin modal --}}


        @forelse ($LostPets as $LostPet)
            <div class="card mt-3 col-sm-6 col-md-6 mx-auto d-block ">
                <div class="card-header">
                    <div class="user-info d-flex align-items-center">
                        <a href="{{ (Auth::id() == $LostPet->user->id) ? route('user-profile.showOwn', $LostPet->user->id) : route('user-profile.showOthers', $LostPet->user->id) }}">
                            @if($LostPet->user->profile && $LostPet->user->profile->photo)
                                <img src="{{ asset('storage/images/' . $LostPet->user->profile->photo) }}" alt="Foto de perfil de usuario">
                            @endif
                            {{ $LostPet->user->name }}
                        </a>
                    </div>
                    

                    {{-- icono de tres puntos mas menu que muestra el icono --}}

                    {{-- Verifica si el usuario está autenticado y verificar si el usuario actual
                    tiene permisos para editar la mascota perdida específica.
                    si tiene permiso se muestran los botones --}}

                    @auth
                        @if( Auth::user()->id == $LostPet->user_id)
                        <div class="btn-group dropend">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                {{-- icono de tres puntos --}}
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item"  href="{{ route('lost-pets.edit', $LostPet->id) }}">Editar</a></li>
                                <li>
                                    <form method="POST" action="{{ route('lost-pets.destroy', $LostPet->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Eliminar</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                          @endif
                          @endauth    
                    {{-- fin del icono y su menu --}}
                </div>

                <div class="card-body  d-flex justify-content-center align-items-center flex-column">
                    <div class="container-title-pets">
                        <h4 class="title-pet">
                            Se perdio {{ $LostPet->name }}
                        </h4>
                    </div>
                    <div class="container-description-pets">
                        <p>{{ $LostPet->description }}</p>
                    </div>

                    {{-- el if comprueba si existe una img, si existe la muestra --}}
                    @if ($LostPet->photo && file_exists(public_path('storage/images/'.$LostPet->photo)))
                        <div class="container-img-pets">
                            <img class="card-img" src="{{ asset('storage/images/'.$LostPet->photo) }}" alt="img de la mascota">
                        </div>
                    @endif

                    <div class="container-location-pets">
                        <p class="title-location">Ubicacion donde se perdio la mascota.</p>
                        <p>{{ $LostPet->location }}</p>
                    </div>
                    <div class="container-date-pets">
                        <small>Se perdio el {{ \Carbon\Carbon::parse($LostPet->date_lost)->format('d/m/Y') }}</small>
                    </div>
                    
                    </div>
                    
                <div class="card-footer d-flex justify-content-center align-items-center">
                    
                    <div class="container-acciones-users">
                        {{-- boton y contador de like --}}
                        @livewire('like-button', ['modelId' => $LostPet->id, 'modelType' => 'lost-pet'])

                        {{-- componente de contador y ocultador de comentarios --}}
                        <div class="container-comment-count"> 
                        <button class="btn-coment-count toggle-comments-btn" >Comentarios 
                        </button>
                        @livewire('comments-component', ['modelId' => $LostPet->id, 'modelType' => 'lost-pet'])
                        </div>
                        {{-- boton para el modal de cometario --}}
                        <button type="button" class="btn btn-primary openModalButton " data-bs-toggle="modal" data-bs-target="#formulario-comment-lost-pets">
                            Comentar
                        </button>
                        {{-- incluir el modal con el formulario para comentarios --}}
                        @include('components.modal-create-comment-lost-pets')

                         {{-- incluir el boton de compartir --}}
                         @include('components.btn-compartir') 
                         </div>

                </div>
            </div>

           
            @if($LostPet->lostPetComments->isNotEmpty())
                <div class="containter-comentarios comments-section-visible"  style="display: none">
                    <div class="comentario">
                        <div class="title-comment">
                            <h4>Comentarios</h4>
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
            </div>
            @endif
          
              



              

           
                
        @empty
            <div class="container-no-mascota">
                <p class="no-hay-mascota">No hay mascotas perdidas</p>   
            </div>         
        @endforelse
    </section>
@endsection
