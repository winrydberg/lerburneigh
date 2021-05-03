<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('regions')->insert([
            'name' => 'Greater Accra',
        ]);
        DB::table('regions')->insert([
            'name' => 'Volta',
        ]);
        DB::table('regions')->insert([
            'name' => 'Eastern',
        ]);
        DB::table('regions')->insert([
            'name' => 'Central',
        ]);
    }
}