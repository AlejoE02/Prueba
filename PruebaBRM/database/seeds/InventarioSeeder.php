<?php

use App\Inventario;
use Illuminate\Database\Seeder;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventario::insert([
            ['id'=>'1','nombre_producto'=>'producto1','cantidad'=> '100', 'codigo_lote'=>'codigo1', 'fecha_de_vencimiento'=>'2019-07-09', 'precio' => '10.0'],
            ['id'=>'2','nombre_producto'=>'producto2','cantidad'=> '50', 'codigo_lote'=>'codigo2', 'fecha_de_vencimiento'=>'2019-07-10', 'precio' => '20.0'],
            ['id'=>'3','nombre_producto'=>'producto3','cantidad'=> '150','codigo_lote'=>'codigo3', 'fecha_de_vencimiento'=>'2019-07-11', 'precio' => '30.0']
            ]);
    }
}
