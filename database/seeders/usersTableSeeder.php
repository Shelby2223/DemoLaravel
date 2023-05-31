<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        DB::table('users')->insert([
            [
            'name' => Str::random(20),
            'email'=>Str::random(10).'@gmail.com',
            'password'=>'123123123',

        ],
        [
            'name' => Str::random(20),
            'email'=>Str::random(10).'@gmail.com',
            'password'=>b'123123123',

        ]]);
    }
}