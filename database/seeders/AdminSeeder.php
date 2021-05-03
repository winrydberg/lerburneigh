<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('admins')->insert([
            'name' => 'Edwin Senunyeme',
            'email' => 'edwinsenunyeme5@gmail.com',
            'phoneno' => '0204052513',
            'password' => Hash::make('password'),
        ]);

        DB::table('admins')->insert([
            'name' => 'Sename Abotsi',
            'email' => 'sename@selikemcareoptions.co.uk',
            'phoneno' => '0248201381',
            'password' => Hash::make('password'),
        ]);
    }
}