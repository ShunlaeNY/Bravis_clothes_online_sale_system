<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            'name'=> 'Blazer Set',
            'category' => 'Coat',
            'price'=> 2300000,
            'description' => 'sdjghjkdhkj dkjfhg ksdkjhkdsh sdklj lksdj ',
            'gender' => 'male',
            'quantity'=> 20,
            'image' => '-'

        ]);
        
    }
}
