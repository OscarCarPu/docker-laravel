<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $citas = auth()->user()->citas()->latest()->get();
        return view('cliente.index', compact('citas'));
    }

    public function create(){
        return view('cliente.create');
    }

    public function store(Request $request){
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'matricula' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'duracion_estimada' => 'required|integer',
        ]);

        try {
            auth()->user()->citas()->create($request->only([
                'marca',
                'modelo',
                'matricula',
                'fecha',
                'hora',
                'duracion_estimada'
            ]));
            return redirect()->route('cliente.index')->with('success', 'Cita creada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('cliente.create')->with('error', 'Error al crear la cita');
        }
    }

    public function show($id){
        $cita = auth()->user()->citas()->findOrFail($id);
        return view('cliente.show', compact('cita'));
    }
}
