@extends('layouts.app')

@section('title', 'Lista de Países')

@section('content')
    <h1>Países</h1>
    <a href="{{ route('countries.create') }}" class="btn btn-primary mb-3">Agregar País</a>
    <ul>
        @foreach($countries as $country)
            <li>{{ $country->name }}
                <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
