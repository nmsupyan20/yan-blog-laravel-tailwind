<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'supyan',
                    'email' => 'supyan123@gmail.com',
                    'username' => 'supyan123',
                    'roles' => 'owner',
                    'password' => Hash::make('supyan123'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'name' => 'pyan',
                    'email' => 'pyan27@gmail.com',
                    'username' => 'pyan27',
                    'roles' => 'admin',
                    'password' => Hash::make('pyan27'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'name' => 'nur',
                    'email' => 'nur22@gmail.com',
                    'username' => 'nur22',
                    'roles' => 'admin',
                    'password' => Hash::make('nur22'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        );
    }
}
