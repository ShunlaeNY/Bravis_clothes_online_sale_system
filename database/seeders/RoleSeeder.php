<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('roles')->insert([[
            'name' => 'Admin',
            'uuid' => Str::uuid()->toString(),
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],[
            'name' => 'Staff',
            'uuid' => Str::uuid()->toString(),
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]]);
    }
}
