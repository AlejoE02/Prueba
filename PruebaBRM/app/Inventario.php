<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $connection = 'prueba';

    protected $table = 'inventario';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre_producto',
        'cantidad',
        'codigo_lote',
        'fecha_de_vencimiento',
        'precio',
    ];
}
