<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table="categorias";
    //columnas
    protected $fillable=["nombre","descripcion","status"];

    //desactivar las marcas de tiempo
    public $timestamps=false;

    //relacion con productos: uno a muchos
    public function productos(){
        return $this->hasMany(Producto::class,'id');
    }
}
