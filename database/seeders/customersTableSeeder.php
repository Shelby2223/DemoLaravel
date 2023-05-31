<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class customersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'customer_name' => Str::random(20),
                'customer_phone' => Str::random(20),
                'customer_email' => Str::random(10).'@gmail.com',
                'customer_type' => 'B2B',
            ],
            [
                'customer_name' => Str::random(20),
                'customer_phone' => Str::random(20),
                'customer_email' => Str::random(10).'@gmail.com',
                'customer_type' => 'B2C',
            ],
            // Thêm dữ liệu khác vào đây nếu cần
        ]);
        
    }
}
