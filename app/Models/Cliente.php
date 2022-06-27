<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable
{
    use Notifiable;

    protected $table = 'cliente';
    protected $fillable = ['usuario', 'nombre', 'email', 'telefono', 'pass', 'direccion','colonia', 'ciudad', 'municipio','estado'];
    protected $hidden = ['pass','api_token'];
    public $primarykey = 'usuario';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    //LISTA E PEDIDOS-VENTAS DEL CLIETNE
    public function ventas(){
        return $this->hasMany('App\Models\Venta','cliente');
    }
    public function getAuthPassword()
    {
        return $this->attributes['pass'];
    }
}
