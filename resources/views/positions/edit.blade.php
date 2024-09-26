@extends('layouts.app')

@section('title', 'Editar Cargo')

@section('content')
    <h1>Editar Cargo</h1>
    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre del Cargo</label>
            <input type="text" class="form-control" name="name" value="{{ $position->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
