<?php

use App\RolUsuario;
use Illuminate\Database\Seeder;

class TipoUser extends Seeder
{
    
    public function run()
    {
        RolUsuario::insert([
            ['id'=>'1','descripcion'=>'Proveedor'],
            ['id'=>'2','descripcion'=>'Cliente']
        ]);
    }
}