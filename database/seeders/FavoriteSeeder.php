<?php

namespace Database\Seeders;

use App\Models\ChFavorite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Define the roles data
        $genres = [
           [
                'user_id' => 2,
                'favorite_id' => 1,
           ],
           [
            'user_id' => 3,
            'favorite_id' => 1,
       ],
        ];

        // Insert the roles into the database
        foreach ($genres as $genre) {
            ChFavorite::create($genre);
        }
    }
}
