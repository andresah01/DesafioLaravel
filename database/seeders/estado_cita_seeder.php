<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class estado_cita_seeder extends Seeder
{
    static $estados = [
        'activa',
        'cancelada',
        'finalizada'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$estados as $estado){
            DB::table('estado_cita')->insert([
                'descripcion' => $estado
            ]);
        }//
    }
}
