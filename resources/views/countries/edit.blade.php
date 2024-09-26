@extends('layouts.app')

@section('title', 'Editar País')

@section('content')
    <h1>Editar País</h1>
    <form action="{{ route('countries.update', $country->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre del País</label>
            <input type="text" class="form-control" name="name" value="{{ $country->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
