<?php

use Illuminate\Database\Seeder;

class CepsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ceps')->delete();

        if(DB::table('ceps')->exists())
        {
            exec("mysql -u "
                .env('DB_USERNAME')
                ." -p"
                .env('DB_PASSWORD')
                ." "
                .env('DB_DATABASE')
                ." "
                .asset('sql')
                ." < ceps.sql");
        }

    }

}