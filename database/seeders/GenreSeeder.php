<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// DB読込
use Illuminate\Support\Facades\DB;
// Carbon読込
use Carbon\Carbon;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            [
                'name' => '有給休暇',
                'created_at' => Carbon::now()->__toString(),
                'updated_at' => Carbon::now()->__toString(),
            ],
            [
                'name' => '育児休暇',
                'created_at' => Carbon::now()->__toString(),
                'updated_at' => Carbon::now()->__toString(),
            ],
            [
                'name' => '病気休暇',
                'created_at' => Carbon::now()->__toString(),
                'updated_at' => Carbon::now()->__toString(),
            ],
        ]);
    }
}
