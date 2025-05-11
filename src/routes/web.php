<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TallerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AccessMiddleware;

require __DIR__.'/auth.php';

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        
        $redirect = null;
        if ($user->role === 'cliente') {
            $redirect = redirect()->route('cliente.index');
        } else {
            $redirect = redirect()->route('taller.index');
        }
        
        if (session('error')) {
            $redirect->with('error', session('error'));
        }
        if (session('success')) {
            $redirect->with('success', session('success'));
        }
        
        return $redirect;
    }
    
    if (session('error')) {
        return redirect('/login')->with('error', session('error'));
    }
    
    return redirect('/login');
});

Route::middleware(['auth', AccessMiddleware::class.':cliente'])->group(function () {
    Route::get('/cliente/citas', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cliente/citas/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/cliente/citas', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/cliente/citas/{cita}', [ClienteController::class, 'show'])->name('cliente.show');
});

Route::middleware(['auth', AccessMiddleware::class.':taller'])->group(function () {
    Route::get('/taller/citas', [TallerController::class, 'index'])->name('taller.index');
    Route::get('/taller/citas/{cita}', [TallerController::class, 'show'])->name('taller.show');
    Route::get('/taller/citas/{cita}/edit', [TallerController::class, 'edit'])->name('taller.edit');
    Route::put('/taller/citas/{cita}', [TallerController::class, 'update'])->name('taller.update');
    Route::delete('/taller/citas/{cita}', [TallerController::class, 'destroy'])->name('taller.destroy');
});

Route::fallback(function () {
    return redirect('/')->with('error', 'No se ha encontrado la página solicitada.');
});