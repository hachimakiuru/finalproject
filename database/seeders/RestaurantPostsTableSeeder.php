<?php

namespace Database\Seeders;

use App\Models\RestaurantPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurantPosts = [
            [
                'user_id' => 2,
                'name' => 'Bigg Duddy',
                'address' => 'ShinjukuKu, Tokyo',
                'open_time' => null,
                'close_time' => null,
                'genre_place' => 'Shibuya',
                'genre_variety' => 'Ramen',
                'genre_religion' => 'Vegetarian',
                'genre_payment' => '現金のみ',
                'genre_wifi' => null,
                'image_path' => null,
                'favorite' => null,
            ],

        ];

        foreach ($restaurantPosts as $restaurantPost) {
            RestaurantPost::create($restaurantPost);
        }
    }
}
