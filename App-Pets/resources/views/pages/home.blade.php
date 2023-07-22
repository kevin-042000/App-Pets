@extends('layouts.base')
@section('title','Home')
    
@section('content')
{{-- Menu de navegacion --}}
@include('layouts._partials.nav')

{{-- Aqui se empieza a ver los datos de animales peridos --}}
<section class="container">
    {{-- Mensaje por si no hay publiciones --}}
    @if ($message)
        <div class="container-no-mascota">
            <p class="no-hay-mascota">{{ $message }}</p>
        </div>
    @else
        {{-- Mostrar todas las mascotas ordenadas por fecha --}}
        @foreach ($SortedPets as $pet)
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-center align-items-center pt-2">
                        {{ $pet instanceof App\Models\LostPet ? 'Se perdió' : 'Titulo: ' }}
                        {{ $pet->name ?? $pet->title }}
                    </h3>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
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

            </div>
        @endforeach
    @endif
</section>



@endsection