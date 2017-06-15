<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'id'            => 1,
                'name'          => 'Administrador Sistema Desarrollo',
                'email'			=> 'proyecto@mailinator.com',
                'password'		=> bcrypt('Espacios1234'),
                'perfil_id'		=> 1
            ]);
    }
}
