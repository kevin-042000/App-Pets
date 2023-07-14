@extends('layouts.base')
@section('title','Found Pets')
    
@section('content')
<section class="cont-form">
    @component('components.form-create')
    @slot('action')
        {{ route('found-pets.store') }}
    @endslot
@endcomponent
</section>
<section class="contend">
    <ul>
        @forelse ($FoundPets as $FoundPet)
            <li>
                <h3>{{ $FoundPet->name }}</h3>
                <p>{{ $FoundPet->description }}</p>
                <p>{{ $FoundPet->location }}</p>
                <p>{{ $FoundPet->date_lost }}</p>
                <a href="{{ route('found-pets.edit', $LostPet->id) }}">Editar</a>

                <form method="POST" action="{{ route('found-pets.destroy', $FoundPet->id) }}" >
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="DELETE">
                </form>
            </li>            
        @empty
        <p>No hay mascotas encontradas</p>            
        @endforelse
    </ul>

</section>
@endsection