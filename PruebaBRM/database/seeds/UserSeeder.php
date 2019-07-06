<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        User::insert([
            ['name'=>'Proveedor','email'=>'proveedor@app.com','password'=> bcrypt('root'), 'FK_tipo_usuario'=>'1'],
            ['name'=>'Cliente','email'=>'cliente@app.com','password'=> bcrypt('root'), 'FK_tipo_usuario'=>'2']
        ]);
    }
}