<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rafa',
            'email' => 'rafa@hotmail.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://recetas.com',
        ]);

        User::create([
            'name' => 'Juan',
            'email' => 'correo@hotmail.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://recetas.com',
        ]);
    }
}
