<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sizes')->insert([[
            'name' => 'S',
            'uuid' => Str::uuid()->toString(),
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],[
            'name' => 'M',
            'uuid' => Str::uuid()->toString(),
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],[
            'name' => 'L',
            'uuid' => Str::uuid()->toString(),
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],[
            'name' => 'XL',
            'uuid' => Str::uuid()->toString(),
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],[
            'name' => '2XL',
            'uuid' => Str::uuid()->toString(),
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],[
            'name' => '3XL',
            'uuid' => Str::uuid()->toString(),
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],[
            'name' => '4XL',
            'uuid' => Str::uuid()->toString(),
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]]);
    }
}
