@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Detalle de la Cita</h1>

    <div class="mb-3"><strong>Marca:</strong> {{ $cita->marca }}</div>
    <div class="mb-3"><strong>Modelo:</strong> {{ $cita->modelo }}</div>
    <div class="mb-3"><strong>Matrícula:</strong> {{ $cita->matricula }}</div>
    <div class="mb-3"><strong>Fecha:</strong> {{ $cita->fecha ?? 'Pendiente' }}</div>
    <div class="mb-3"><strong>Hora:</strong> {{ $cita->hora ?? 'Pendiente' }}</div>
    <div class="mb-3"><strong>Duración:</strong> {{ $cita->duracion_estimada ?? 'No asignada' }} min</div>

    <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Volver</a>
@endsection
