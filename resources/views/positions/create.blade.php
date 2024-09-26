@extends('layouts.app')

@section('title', 'Crear Cargo')

@section('content')
    <h1>Crear Cargo</h1>
    <form action="{{ route('positions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Cargo</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
