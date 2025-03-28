<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'User Tester',
            'email' => 'test@example.com',
            'password' => Hash::make('123123123'),
            'dob' => Carbon::parse('2000-01-01'),
            'gender' => 'male',
        ]);
    }
}
