<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CardioEntry;

class CardioEntriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('CardioEntries')->insert([
            ['user_id' => 1,
            'date' => '2021-01-01',
            'type_id' => 1,
            'duration' => 30,
            'distance' => 5.3],
            ['user_id' => 1,
            'date' => '2021-01-10',
            'type_id' => 2,
            'duration' => 10,
            'distance' => 1.3],
            ['user_id' => 1,
            'date' => '2024-03-01',
            'type_id' => 3,
            'duration' => 5,
            'distance' => 10.3],
            ['user_id' => 1,
            'date' => '2023-01-01',
            'type_id' => 4,
            'duration' => 60,
            'distance' => 20.3],
        ]);
        CardioEntry::factory()->count(50)->create();
    }
}
