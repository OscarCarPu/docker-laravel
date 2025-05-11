@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Citas de Clientes</h1>

    <div class="list-group">
        @forelse ($citas as $cita)
            <a href="{{ route('taller.show', $cita) }}" class="list-group-item list-group-item-action">
                {{ $cita->user->name }} - {{ $cita->marca }} {{ $cita->modelo }}
                <span class="text-muted">
                    @if (!$cita->fecha)
                        - Pendiente
                    @else
                        - {{ $cita->fecha }} {{ $cita->hora }}
                    @endif
                </span>
            </a>
        @empty
            <p>No hay citas registradas.</p>
        @endforelse
    </div>
@endsection
