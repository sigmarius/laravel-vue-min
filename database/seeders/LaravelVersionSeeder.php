<?php

namespace Database\Seeders;

use App\Models\LaravelVersion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaravelVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LaravelVersion::factory()->createMany([
           ['title' => '10.40.0', 'release_date' => '2024-01-09'],
           ['title' => '10.39.0', 'release_date' => '2023-12-27'],
           ['title' => '10.38.2', 'release_date' => '2023-12-22'],
           ['title' => '10.38.1', 'release_date' => '2023-12-22'],
           ['title' => '10.38.0', 'release_date' => '2023-12-19'],
           ['title' => '10.37.3', 'release_date' => '2023-12-14'],
        ]);
    }
}
