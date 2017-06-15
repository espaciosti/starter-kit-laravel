<?php

use Illuminate\Database\Seeder;
use App\Models\PerfilMenu;

class PerfilMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PerfilMenu::create([
                'menu_id'            => 1,
                'perfil_id'          => 1
            ]);

        PerfilMenu::create([
                'menu_id'            => 2,
                'perfil_id'          => 1
            ]);

        PerfilMenu::create([
                'menu_id'            => 3,
                'perfil_id'          => 1
            ]);
    }
}
