<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $fillable = ['categoria', 'nombre', 'descripcion', 'marca', 'cantidad', 'precio'];
    public $timestamps = false;

    //LISTA DE VENTAS PRODUCTO QUE SE VENDIO
    public function ventas(){
        return $this->belongsToMany('App\Models\Venta','venta-producto','idVenta','idProducto');
    }
}
