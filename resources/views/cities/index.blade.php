@extends('layouts.app')

@section('content')
    <h1>Ciudades</h1>
    <a href="{{ route('cities.create') }}" class="btn btn-primary mb-3">Agregar Ciudad</a>
    <ul>
        @foreach($cities as $city)
            <li>{{ $city->name }} ({{ $city->country->name }})</li>
        @endforeach
    </ul>
@endsection
