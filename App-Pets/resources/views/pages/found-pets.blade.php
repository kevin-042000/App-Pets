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

<section class="container">
    @forelse ($FoundPets as $FoundPet)
 
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title d-flex justify-content-center align-items-center pt-2">
                {{ $FoundPet->title }}
            </h3>
        </div>

        <div class="card-body d-flex justify-content-center align-items-center flex-column">
            <div class="mb-1">
                <p>{{ $FoundPet->description }}</p>
            </div>
            <div class="mb-1">
                <p>Se encontro en: {{ $FoundPet->location }}</p>
            </div>
            <div class="mb-1">
                <p>Fecha en la que se encontro:  {{ \Carbon\Carbon::parse($FoundPet->date_found)->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-center align-items-center">
            {{-- Verifica si el usuario está autenticado y verificar si el usuario actual
            tiene permisos para editar la mascota perdida específica.
            si tiene permiso se muestran los botones --}}

            @auth
            @if( Auth::user()->id == $FoundPet->id)
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
  {{-- Si no hay publicaciones se muestra esto   --}}
    @empty
    <div class="container-no-mascota">
        <p class="no-hay-mascota">No hay mascotas encontradas</p>   
    </div>         
    @endforelse

</section>
@endsection