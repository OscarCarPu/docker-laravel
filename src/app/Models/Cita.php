<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'matricula',
        'fecha',
        'hora',
        'duracion_estimada',
        'user_id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
