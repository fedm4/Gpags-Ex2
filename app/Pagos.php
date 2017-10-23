<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    use Notifiable;
    protected $table = "pagos";
    protected $primaryKey = 'codigopago';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha', 'importe',
    ];

    public function user(){
        return $this->belongsToMany('App\User', 'usuariospagos', 'codigopago', 'codigousuario');
    }
}
