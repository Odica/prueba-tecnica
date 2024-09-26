@extends('layouts.app')

@section('title', 'Crear País')

@section('content')
    <h1>Crear País</h1>
    <form action="{{ route('countries.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del País</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
