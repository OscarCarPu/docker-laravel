@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Mis Citas</h1>

    <a href="{{ route('cliente.create') }}" class="btn btn-primary mb-3">Solicitar nueva cita</a>

    <div class="list-group">
        @forelse ($citas as $cita)
            <a href="{{ route('cliente.show', $cita) }}" class="list-group-item list-group-item-action">
                {{ $cita->marca }} {{ $cita->modelo }} ({{ $cita->matricula }})
                <span class="text-muted">
                    @if ($cita->fecha)
                        - {{ $cita->fecha }} {{ $cita->hora }}
                    @else
                        - Pendiente
                    @endif
                </span>
            </a>
        @empty
            <p>No tienes citas aún.</p>
        @endforelse
    </div>
@endsection
