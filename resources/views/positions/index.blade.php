@extends('layouts.app')

@section('title', 'Lista de Cargos')

@section('content')
    <h1>Cargos</h1>
    <a href="{{ route('positions.create') }}" class="btn btn-primary mb-3">Agregar Cargo</a>
    <ul>
        @foreach($positions as $position)
            <li>{{ $position->name }}
                <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
