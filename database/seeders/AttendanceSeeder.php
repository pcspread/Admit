<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// DB読込
use Illuminate\Support\Facades\DB;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attendances')->insert([
            [
                'user_id' => 1,
                'start_at' => '2023-12-08 09:00:00',
                'end_at' => '2023-12-08 18:00:00',
                'date_at' => '2023-12-08',
                'total_at' => '09:00:00',
            ],
            [
                'user_id' => 1,
                'start_at' => '2023-12-11 09:00:00',
                'end_at' => '2023-12-11 19:00:00',
                'date_at' => '2023-12-11',
                'total_at' => '10:00:00',
            ],
            [
                'user_id' => 1,
                'start_at' => '2023-12-12 09:00:00',
                'end_at' => '2023-12-12 19:00:00',
                'date_at' => '2023-12-12',
                'total_at' => '10:00:00',
            ],
            [
                'user_id' => 1,
                'start_at' => '2023-12-13 09:00:00',
                'end_at' => '2023-12-13 19:30:00',
                'date_at' => '2023-12-13',
                'total_at' => '10:00:00',
            ],
            [
                'user_id' => 1,
                'start_at' => '2023-12-14 09:00:00',
                'end_at' => '2023-12-14 19:45:00',
                'date_at' => '2023-12-14',
                'total_at' => '10:00:00',
            ],
            [
                'user_id' => 1,
                'start_at' => '2023-12-15 09:00:00',
                'end_at' => '2023-12-15 18:45:00',
                'date_at' => '2023-12-15',
                'total_at' => '10:00:00',
            ],
        ]);
    }
}
