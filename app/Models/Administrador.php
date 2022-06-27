<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    use Notifiable;

    protected $table = 'administrador';
    protected $fillable = ['nombre', 'email', 'telefono', 'pass'];
    public $primarykey = 'usuario';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->attributes['pass'];
    }
}
