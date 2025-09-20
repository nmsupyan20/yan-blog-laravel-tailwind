<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Pemograman',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Kesehatan',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Kebugaran',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Technology',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
