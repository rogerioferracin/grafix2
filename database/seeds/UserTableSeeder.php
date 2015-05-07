<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function seed()
    {
        //delete old data
        DB::table('users')->delete();

        DB::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'name'     => 'Administrador',
            'email'    => 'admin@email.com',
            'funcao_id' => 'admin',
        ]);
    }
}