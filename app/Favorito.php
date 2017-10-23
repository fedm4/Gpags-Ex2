<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Favoritos extends Authenticatable
{
    use Notifiable;
    protected $table = "usuarios";
    protected $primaryKey = 'codigousuario';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario', 'clave', 'edad',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'clave', 'remember_token',
    ];
    public function pagos(){
        return $this->belongsToMany('App\Pagos', 'usuariospagos', 'codigousuario', 'codigopago');
    }

    public function getAuthPassword(){
      return $this->clave;
    }
}
