@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')
    <h1>Editar Empleado</h1>
    
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="first_name">Nombre</label>
            <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" required>
        </div>

        <div class="form-group">
            <label for="last_name">Apellido</label>
            <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" required>
        </div>

        <div class="form-group">
            <label for="identification">Identificación</label>
            <input type="text" name="identification" class="form-control" value="{{ $employee->identification }}" required>
        </div>

        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" name="address" class="form-control" value="{{ $employee->address }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}" required>
        </div>

        <div class="form-group">
            <label for="country_id">País</label>
            <select name="country_id" id="country_id" class="form-control">
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ $country->id == $employee->country_id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="city_id">Ciudad</label>
            <select name="city_id" id="city_id" class="form-control">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ $city->id == $employee->city_id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="positions">Cargos</label>
            <select name="positions[]" class="form-control" multiple>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}" 
                        {{ in_array($position->id, $employee->positions->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $position->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
    </form>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#country_id').on('change', function() {
            var countryId = $(this).val();
            console.log('Selected country ID:', countryId);
            console.log('AJAX URL:', '/prueba-tecnica/public/cities-by-country/' + countryId);
            if (countryId) {
                $.ajax({
                    url: '/prueba-tecnica/public/cities-by-country/' + countryId,
                    type: 'GET',
                    success: function(data) {
                        console.log('AJAX response:',
                            data);
                        if (data.length === 0) {
                            console.log(
                                'No cities found for this country'
                                );
                        }
                        $('#city_id').empty();
                        $('#city_id').append(
                            '<option value="">Seleccione una ciudad</option>');
                        $.each(data, function(key, city) {
                            $('#city_id').append('<option value="' + city.id +
                                '">' + city.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', status,
                            error);
                    }
                });
            } else {
                $('#city_id').empty();
                $('#city_id').append('<option value="">Seleccione un país primero</option>');
            }
        });
    });
</script>

