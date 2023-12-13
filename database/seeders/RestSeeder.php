<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// DB読込
use Illuminate\Support\Facades\DB;

class RestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rests')->insert([
            'user_id' => ,
            'attendance_id' => ,
            'break_at' =>,
            'restart_at' => ,
            'total_at' => ,
        ]);
    }
}
