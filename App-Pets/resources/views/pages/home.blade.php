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
<div class="card mt-3  col-6 mx-auto d-block">
    <div class="card-header">
        <div class="user-info d-flex align-items-center">
            <a href="{{ route('user-profile.showOwn', $pet->user->id) }}">
                @if($pet->user->profile && $pet->user->profile->photo)
                    <img src="{{ asset('storage/images/' . $pet->user->profile->photo) }}" alt="Foto de perfil de usuario">
                @endif
                {{ $pet->user->name }}
            </a>
        </div>

        @auth
            @if( Auth::user()->id == $pet->user_id)
            <div class="btn-group dropend">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item"  href="{{ route(($pet instanceof App\Models\LostPet ? 'lost-pets' : 'found-pets') . '.edit', $pet->id) }}">Editar</a></li>
                    <li>
                        <form method="POST" action="{{ route(($pet instanceof App\Models\LostPet ? 'lost-pets' : 'found-pets') . '.destroy', $pet->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item">Eliminar</button>
                        </form>
                    </li>
                </ul>
            </div>
              @endif
        @endauth
    </div>

    <div class="card-body  d-flex justify-content-center align-items-center flex-column">
        <hr>
        <div class="container-title-pets">
            <h3 class="card-title d-flex justify-content-center align-items-center pt-2">
                {{ $pet instanceof App\Models\LostPet ? 'Se perdió ' . $pet->name : $pet->title }}
            </h3>
            
        </div>
        <hr >
        <div class="container-description-pets">
            <p>{{ $pet->description }}</p>
        </div>

        @if ($pet->photo && file_exists(public_path('storage/images/'.$pet->photo)))
            <div class="container-img-pets">
                <img class="card-img" src="{{ asset('storage/images/'.$pet->photo) }}" alt="img de la mascota">
            </div>
        @endif

        <div class="container-location-pets">
            <p>{{ $pet instanceof App\Models\LostPet ? 'Se perdio en' : 'Se encontró en' }} {{ $pet->location }}</p>
        </div>
        <div class="container-date-pets">
            <p>{{ $pet instanceof App\Models\LostPet ? 'Se perdio el' : 'Se encontró el' }} {{ \Carbon\Carbon::parse($pet->date_lost ?? $pet->date_found)->format('d/m/Y') }}</p>
        </div>
    </div>
    
    <div class="card-footer d-flex justify-content-center align-items-center">
        <div class="container-acciones-users">
            @livewire('like-button', ['modelId' => $pet->id, 'modelType' => $pet instanceof App\Models\LostPet ? 'lost-pet' : 'found-pet'])

            <div class="container-comment-count"> 
            <button class="btn-coment-count toggle-comments-btn">Comentarios 
            </button>
            @livewire('comments-component', ['modelId' => $pet->id, 'modelType' => $pet instanceof App\Models\LostPet ? 'lost-pet' : 'found-pet'])
            </div>

            <button type="button" class="btn btn-primary openModalButton " data-bs-toggle="modal" data-bs-target="#formulario-comment-{{ $pet instanceof App\Models\LostPet ? 'lost-pets' : 'found-pets' }}">
                Comentar
            </button>

            @include('components.modal-create-comment-' . ($pet instanceof App\Models\LostPet ? 'lost-pets' : 'found-pets'))
            @include('components.btn-compartir') 
        </div>
    </div>
</div>

@if(($pet instanceof App\Models\LostPet && $pet->lostPetComments->isNotEmpty()) || 
($pet instanceof App\Models\FoundPet && $pet->foundPetComments->isNotEmpty()))
<div class="containter-comentarios comments-section-visible" style="display: none">
    <div class="comentario">
        <div class="title-comment">
            <h3>Comentarios</h3>
        </div>

        @if($pet instanceof App\Models\LostPet)
            @foreach($pet->lostPetComments as $comment)
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
                        <form method="POST" action="{{ route('comments.destroy', ['type' => 'lost', 'comment' => $comment->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </div>
                    </div>
            </div>
            @endforeach
        @elseif($pet instanceof App\Models\FoundPet)
            @foreach($pet->foundPetComments as $comment)
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
                       <form method="POST" action="{{ route('comments.destroy', ['type' => 'found', 'comment' => $comment->id]) }}">
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



@endforeach
    @endif
</section>
@endsection

