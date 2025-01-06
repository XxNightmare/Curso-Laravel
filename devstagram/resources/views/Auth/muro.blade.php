@extends('layouts.app')

@section('titulo')
    Muro
@endsection

@section('contenido')
    <h1>Bienvenido este es el muro</h1>
    <p>Estás autenticado como {{ auth()->user()->name }}</p>
@endsection

@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-500 text-white p-4 rounded">
        {{ session('error') }}
    </div>
@endif
