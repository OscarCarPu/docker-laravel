@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Editar Cita</h1>

    <form method="POST" action="{{ route('taller.update', $cita) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Marca</label>
            <input type="text" name="marca" value="{{ old('marca', $cita->marca) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Modelo</label>
            <input type="text" name="modelo" value="{{ old('modelo', $cita->modelo) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Matrícula</label>
            <input type="text" name="matricula" value="{{ old('matricula', $cita->matricula) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" name="fecha" value="{{ old('fecha', $cita->fecha) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hora</label>
            <input type="time" name="hora" value="{{ old('hora', $cita->hora) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Duración estimada (min)</label>
            <input type="number" name="duracion_estimada" value="{{ old('duracion_estimada', $cita->duracion_estimada) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('taller.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
