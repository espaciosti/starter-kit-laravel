<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
    			'id'			=> 1,
                'menu'    		=> 'Administración',                
                'url'     		=> '#',
                'icon'   		=> 'ti-panel',
                'parent'   		=> 0,
                'active'		=> 1,
                'order'			=> 1
            ]);

        Menu::create([
    			'id'			=> 2,
                'menu'    		=> 'Usuarios',                
                'url'     		=> 'usuarios',
                'icon'   		=> 'ti-user',
                'parent'   		=> 1,
                'active'		=> 1,
                'order'			=> 1
            ]);

        Menu::create([
    			'id'			=> 3,
                'menu'    		=> 'Perfiles',                
                'url'     		=> 'perfiles',
                'icon'   		=> 'ti-id-badge',
                'parent'   		=> 1,
                'active'		=> 1,
                'order'			=> 2
            ]);
    }
}
