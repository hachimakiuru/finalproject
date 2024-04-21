<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the roles data
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Employee'],
            ['name' => 'Guest'],
        ];

        // Insert the roles into the database
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
