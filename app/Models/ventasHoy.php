<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventasHoy extends Model
{
    use HasFactory;

    protected $table = 'VentasHoy';
    Protected $primaryKey = ["storeid"];
    public $incrementing = false;
}
