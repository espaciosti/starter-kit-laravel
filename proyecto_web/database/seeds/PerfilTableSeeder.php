<?php

use Illuminate\Database\Seeder;
use App\Models\Perfil;


class PerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::create([
                'id'            => 1,
                'perfil'          => 'Administrador'                
            ]);

        Perfil::create([
                'id'            => 2,
                'perfil'          => 'Coordinación'                
            ]);

        Perfil::create([
                'id'            => 3,
                'perfil'          => 'Desarrollador'                
            ]);
    }
}
