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
            <a class="btn-edit" href="{{ route('lost-pets.edit', $FoundPet->id) }}">Editar</a>
          {{-- <a href="{{ route('lost-pets.show', $LostPet->id) }}">detalle</a> --}}
          <form method="POST" action="{{ route('found-pets.destroy', $FoundPet->id) }}" >
            @method('DELETE')
            @csrf
            <input class="btn-delete" type="submit" value="Eliminar">
         </form>
        </div>     
    </div>

@empty
<div class="container-no-mascota">
<p class="no-hay-mascota">No hay mascotas encontradas</p>   
</div>         
@endforelse

</section>
@endsection