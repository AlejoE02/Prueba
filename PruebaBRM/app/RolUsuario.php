<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model
{
    //
    protected $connection = 'prueba';

    protected $table = 'tipo_usuario';

    protected $primaryKey = 'id';
    
    protected $fillable = ['descripcion'];

    public function relacionUsuarioRol()
    {
        return $this->hasOne(User::class,'id','FK_tipo_usuario');
    }
}
