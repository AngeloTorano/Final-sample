<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisitType;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Add sample roles
        Role::insert([
            ['RoleName' => 'Admin'],
            ['RoleName' => 'City Coordinator'],
            ['RoleName' => 'Country Coordinator'],
            ['RoleName' => 'Supply Manager']
        ]);

        // Sample user account
        User::create([
            'RoleID' => 1, // Admin
            'FirstName' => 'John',
            'LastName' => 'Doe',
            'Username' => 'johndoe',
            'PasswordHash' => bcrypt('password123'), // use bcrypt for password
            'PhoneNumber' => '1234567890',
            'City' => 'Sample City',
            'Country' => 'Sample Country'
        ]);
    }
}