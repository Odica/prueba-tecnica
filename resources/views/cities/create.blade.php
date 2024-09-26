@extends('layouts.app')

@section('title', 'Crear Ciudad')

@section('content')
    <h1>Crear Ciudad</h1>
    <form action="{{ route('cities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre de la Ciudad</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="country_id">País</label>
            <select name="country_id" class="form-control">
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
