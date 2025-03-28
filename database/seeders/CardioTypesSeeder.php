<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardioTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('CardioTypes')->insert([
            ['name' => 'Jogging',
            'image' => 'fa-solid:walking'],
            ['name' => 'Running',
            'image' => 'fa-solid:running'],
            ['name' => 'Cycling',
            'image' => 'fa-solid:biking'],
            ['name' => 'Swimming',
            'image' => 'map:swimming'],
        ]);
    }
}
