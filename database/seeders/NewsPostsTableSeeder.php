<?php

namespace Database\Seeders;

use App\Models\NewsTimeLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsPostsTableSeeder extends Seeder
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
                'start' => '2024-04-24 11:23:35',
                'end' => '2024-04-24 15:23:35',
                'price' => '2000',
                'place' => 'Shinjuku',
                'others' => 'Thanks!!',
                'genre_id' => 1,
            ],

        ];

        // Insert the roles into the database
        foreach ($newsPosts as $newsPost) {
            NewsTimeLine::create($newsPost);
        }
    }
}
