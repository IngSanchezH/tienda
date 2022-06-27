<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'venta';
    protected $fillable = ['fecha', 'fecha_e', 'total', 'forma_pago'];
    public $timestamps = false;

     //CLIENTE QUE REALIZO LA COMPRA
     public function cliente(){
        return $this->belongsTo('App\Models\Cliente','cliente');
    }

    //LISTA DE PRODUCTOS DE las ventas
    public function productos(){
        return $this->belongsToMany('App\Models\Producto','venta-producto','idProducto','idVenta');
    }
}
