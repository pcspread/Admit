<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Hash読込
use Illuminate\Support\Facades\Hash;
// Carbon読込
use Carbon\Carbon;
// DB読込
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'test1',
                'email' => 'test1@test.com',
                'password' => Hash::make('test1111'),
                'created_at' => Carbon::now()->__toString(),
                'updated_at' => Carbon::now()->__toString(),
            ],
            [
                'name' => 'owner',
                'email' => 'owner@owner.com',
                'password' => Hash::make('owner1111'),
                'created_at' => Carbon::now()->__toString(),
                'updated_at' => Carbon::now()->__toString(),
            ]
        ]);
    }
}
