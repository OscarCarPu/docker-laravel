<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    public function index(){
        $citas = Cita::latest()->get();
        return view('taller.index', compact('citas'));
    }

    public function show($id){
        $cita = Cita::findOrFail($id);
        return view('taller.show', compact('cita'));
    }

    public function edit($id){
        $cita = Cita::findOrFail($id);
        return view('taller.edit', compact('cita'));
    }

    public function update(Request $request, $id){
        try {
            $cita = Cita::findOrFail($id);
            $cita->update($request->only([
                'marca',
                'modelo',
                'matricula',
                'fecha',
                'hora',
                'duracion_estimada'
            ]));
            return redirect()->route('taller.index')->with('success', 'Cita actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('taller.edit', $id)->with('error', 'Error al actualizar la cita');
        }
    }

    public function destroy($id){
        try {
            $cita = Cita::findOrFail($id);
            $cita->delete();
            return redirect()->route('taller.index')->with('success', 'Cita eliminada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('taller.index')->with('error', 'Error al eliminar la cita');
        }
    }
}
