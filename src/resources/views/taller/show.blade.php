@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Detalle de la Cita</h1>

    <div class="mb-3"><strong>Cliente:</strong> {{ $cita->user->name }}</div>
    <div class="mb-3"><strong>Marca:</strong> {{ $cita->marca }}</div>
    <div class="mb-3"><strong>Modelo:</strong> {{ $cita->modelo }}</div>
    <div class="mb-3"><strong>Matrícula:</strong> {{ $cita->matricula }}</div>
    <div class="mb-3"><strong>Fecha:</strong> {{ $cita->fecha ?? 'Pendiente' }}</div>
    <div class="mb-3"><strong>Hora:</strong> {{ $cita->hora ?? 'Pendiente' }}</div>
    <div class="mb-3"><strong>Duración:</strong> {{ $cita->duracion_estimada ?? 'No asignada' }} min</div>

    <a href="{{ route('taller.edit', $cita) }}" class="btn btn-warning me-2">Editar</a>

    <form method="POST" action="{{ route('taller.destroy', $cita) }}" class="d-inline"
          onsubmit="return confirm('¿Seguro que deseas borrar esta cita?')">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>

    <a href="{{ route('taller.index') }}" class="btn btn-secondary mt-3 d-block">Volver</a>
@endsection
