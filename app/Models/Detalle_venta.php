<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_venta extends Model
{
    use HasFactory;

    protected $fillable=['venta_id','producto_id','cantidad','precio_unitario','subtotal'];

    public function venta(){
        return $this->belongsTo(Venta::class,'venta_id');
    }

    public function producto(){
        return $this->belongsTo(Producto::class,'producto_id');
    }
}
