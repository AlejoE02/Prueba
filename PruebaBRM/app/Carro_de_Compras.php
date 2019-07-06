<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro_de_Compras extends Model
{
    protected $connection = 'prueba';

    protected $table = 'carro_de_compras';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_producto',
        'id_usuario',
        'cantidad',
        'estado',
    ];

    public function relacionCarroUsuario()
    {
        return $this->hasMany(User::class,'id','id_usuario');
    }

    public function relacionCarroInventario()
    {
        return $this->hasOne(Inventario::class,'id','id_producto');
    }
}
