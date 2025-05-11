@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Solicitar Nueva Cita</h1>

    <form method="POST" action="{{ route('cliente.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Modelo</label>
            <input type="text" name="modelo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Matrícula</label>
            <input type="text" name="matricula" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hora</label>
            <input type="time" name="hora" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Duración Estimada (minutos)</label>
            <input type="number" name="duracion_estimada" class="form-control" required>
        </div>

        <button class="btn btn-success">Enviar solicitud</button>
    </form>
@endsection
