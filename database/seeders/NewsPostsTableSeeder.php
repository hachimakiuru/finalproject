<?php

namespace Database\Seeders;

use App\Models\NewsTimeLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsPosts = [
            [
                'user_id' => 2,
                'title' => 'Fireworks',
                'content' => 'The most beautiful fireworks in Tokyo!',
                'image' => null,
                'day' => '2024/03/11',
                'price' => '2000',
                'place' => 'Shinjuku',
                'other' => 'Thanks!!',
                'genre_id' => 1,
            ],

        ];

        // Insert the roles into the database
        foreach ($newsPosts as $newsPost) {
            NewsTimeLine::create($newsPost);
        }
    }
}
