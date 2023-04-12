<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Start extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['entity_id' => 1,'name' => 'Leuesky V. U.','identification' => '06800547348','password' => bcrypt('lcr123'),'role' => 'admin'],
            ['entity_id' => 1,'name' => 'Angelo C. R.','identification' => '06800315365','password' => bcrypt('lcr123'),'role' => 'admin'],
            ['entity_id' => 1,'name' => 'Administrador','identification' => '12345','password' => bcrypt('12345'),'role' => 'admin'],
            ['entity_id' => 1,'name' => 'Super admin','identification' => '123456','password' => bcrypt('123456'),'role' => 'super_admin']
        ]);

        DB::table('entitys')->insert([
            'user_id' => 1,
            'name' => 'LCR',
            'description' => 'Laboratorio Clinico Rodriguez',
        ]);

    }
}
