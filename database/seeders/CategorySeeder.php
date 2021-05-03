<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'LEAFY GREEN',
            'slug' =>  Str::slug('LEAFY GREEN'),
            'image' => 'NULL',
            'icon' => 'NULL',
        ]);
        DB::table('categories')->insert([
            'name' => 'CRUCIFEROUS',
            'slug' =>  Str::slug('CRUCIFEROUS'),
            'image' => 'NULL',
            'icon' => 'NULL',
        ]); 
        DB::table('categories')->insert([
            'name' => 'MARROW',
            'slug' =>  Str::slug('MARROW'),
            'image' => 'NULL',
            'icon' => 'NULL',
        ]);
         DB::table('categories')->insert([
            'name' => 'LEGUMES / BEANS',
            'slug' =>  Str::slug('LEGUMES / BEANS'),
            'image' => 'NULL',
            'icon' => 'NULL',
        ]);
        DB::table('categories')->insert([
            'name' => 'OTHERS',
            'slug' =>  Str::slug('OTHERS'),
            'image' => 'NULL',
            'icon' => 'NULL',
        ]);
    }
}