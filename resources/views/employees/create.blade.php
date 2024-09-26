@extends('layouts.app')

@section('title', 'Crear Empleado')

@section('content')
    <h1>Crear Empleado</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">Nombres</label>
            <input type="text" class="form-control" name="first_name" required>
        </div>

        <div class="form-group">
            <label for="last_name">Apellidos</label>
            <input type="text" class="form-control" name="last_name" required>
        </div>

        <div class="form-group">
            <label for="identification">Identificación</label>
            <input type="text" class="form-control" name="identification" required>
        </div>

        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" class="form-control" name="address" required>
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" class="form-control" name="phone" required>
        </div>

        <!-- Seleccionar País -->
        <div class="form-group">
            <label for="country_id">País de nacimiento</label>
            <select name="country_id" id="country_id" class="form-control" required>
                <option value="">Seleccione un país</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Seleccionar Ciudad -->
        <div class="form-group">
            <label for="city_id">Ciudad de nacimiento</label>
            <select name="city_id" id="city_id" class="form-control" required>
                <option value="">Seleccione un país primero</option>
            </select>
        </div>

        <!-- Seleccionar Posición -->
        <div class="form-group">
            <label for="positions">Cargos</label>
            <select name="positions[]" id="positions" class="form-control" multiple required>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
        </div>
        

        <button type="submit" class="btn btn-primary">Guardar</button>
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
                                ); // Agrega este mensaje para depurar
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
                            error); // Muestra cualquier error en la consola
                    }
                });
            } else {
                $('#city_id').empty();
                $('#city_id').append('<option value="">Seleccione un país primero</option>');
            }
        });
    });
</script>
