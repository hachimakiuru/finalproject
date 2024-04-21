<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@test.com',
                'password' => bcrypt('12345678'), // You may use Hash::make() instead of bcrypt() depending on your Laravel version
                'room_number' => '100',
                'role_id' => 1, // Assuming 1 is the ID of the 'Admin' role
            ],
            [
                'name' => 'Guest User',
                'email' => 'guest@test.com',
                'password' => bcrypt('12345678'),
                'room_number' => '300',
                'role_id' => 3, // Assuming 3 is the ID of the 'Guest' role
            ],
            [
                'name' => 'Employee User',
                'email' => 'employee@test.com',
                'password' => bcrypt('12345678'),
                'room_number' => '200',
                'role_id' => 2, // Assuming 2 is the ID of the 'Employee' role
            ],
        ];

        // Insert the users into the database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
