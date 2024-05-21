<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('orders')->insert([[
            'customer_id' => 100,
            'paymentmethod' =>'OTP',
            'customername' =>'Aung Aung',
            'customeremail' =>'aung2@mail.com',
            'total_qty' => 10,
            'phonenumber' => '1124783603498',
            'address' => 'Yangon',
            'total_price' => 12300000,
            'shippingfees' => 2500,
            'uuid' => Str::uuid()->toString(),
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],[
            'customer_id' => 120,
            'paymentmethod' =>'CARD',
            'customername' =>'Aung Kyaw',
            'customeremail' =>'aungkyaw@mail.com',
            'total_qty' => 4,
            'phonenumber' => '1124783603498',
            'address' => 'Yangon',
            'total_price' => 2230000,
            'shippingfees' => 2500,
            'uuid' => Str::uuid()->toString(),
            'status' => 'Active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]]);
    }
}
