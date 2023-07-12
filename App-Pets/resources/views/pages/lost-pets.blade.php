{{-- Plantilla base con los link --}}
@extends('layouts.base')

{{-- Titulo de la vista --}}
@section('title','Lost Pets')

{{-- Contenido General --}}
@section('content')
<section class="cont-form">
    @component('components.form-create')
    @slot('action')
        {{ route('lost-pets.store') }}
    @endslot
@endcomponent
</section>
<section class="contend">
    <ul>
        @forelse ($LostPets as $LostPet)
            <li>
                <h3>{{ $LostPet->name }}</h3>
                <p>{{ $LostPet->description }}</p>
                <p>{{ $LostPet->location }}</p>
                <p>{{ $LostPet->date_lost }}</p>
                {{-- <a href="{{ route('lost-pets.show', $LostPet->id) }}">detalle</a> --}}
                <a href="{{ route('lost-pets.edit', $LostPet->id) }}">Editar</a>

                <form method="POST" action="{{ route('lost-pets.destroy', $LostPet->id) }}" >
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="DELETE">
                </form>
            </li>            
        @empty
        <p>No hay mascotas perdidas</p>            
        @endforelse
    </ul>

</section>
@endsection