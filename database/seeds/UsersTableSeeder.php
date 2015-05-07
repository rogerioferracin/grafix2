<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Grafix\User;


class UsersTableSeeder extends Seeder {

    public function run()
    {
        //delete old data
        DB::table('users')->delete();


        $user = [
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'name'     => 'Administrador',
            'email'    => 'admin@email.com',
            'funcao_id' => 1,
        ];

        User::insert($user);

    }

}