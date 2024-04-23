<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the roles data
        $genres = [
            ['name' => 'Event'],
            ['name' => 'Japan Culture'],
            ['name' => 'Hotel Info'],
            ['name' => 'Other'],
        ];

        // Insert the roles into the database
        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
