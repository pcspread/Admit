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
            [
                'user_id' => 1,
                'attendance_id' => 1,
                'break_at' => '2023-12-08 12:00:00',
                'restart_at' => '2023-12-08 13:00:00',
                'total_at' => '01:00:00',
            ],
            [
                'user_id' => 1,
                'attendance_id' => 2,
                'break_at' => '2023-12-09 12:00:00',
                'restart_at' => '2023-12-09 13:00:00',
                'total_at' => '01:00:00',
            ],
            [
                'user_id' => 1,
                'attendance_id' => 3,
                'break_at' => '2023-12-10 12:00:00',
                'restart_at' => '2023-12-10 13:00:00',
                'total_at' => '01:00:00',
            ],
            [
                'user_id' => 1,
                'attendance_id' => 4,
                'break_at' => '2023-12-11 12:00:00',
                'restart_at' => '2023-12-11 13:00:00',
                'total_at' => '01:00:00',
            ],
            [
                'user_id' => 1,
                'attendance_id' => 5,
                'break_at' => '2023-12-12 12:00:00',
                'restart_at' => '2023-12-12 13:00:00',
                'total_at' => '01:00:00',
            ],
            [
                'user_id' => 1,
                'attendance_id' => 6,
                'break_at' => '2023-12-13 12:00:00',
                'restart_at' => '2023-12-13 13:00:00',
                'total_at' => '01:00:00',
            ]
        ]);
    }
}
