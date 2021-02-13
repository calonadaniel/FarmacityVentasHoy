<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puntosDetalle extends Model
{
    use HasFactory;

    protected $table = 'Puntos_Detalle';
    Protected $primaryKey = ["Id"];
    public $incrementing = false;

}
