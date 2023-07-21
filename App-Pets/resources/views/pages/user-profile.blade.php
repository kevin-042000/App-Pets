@extends('layouts.base')
@section('title','Found Pets')
    
@section('content')
{{-- menu de navegacion --}}
@include('layouts._partials.nav')

{{-- Se incluye el formulario de subir datos --}}
@include('formularios.form-create-user-profile')




@endsection