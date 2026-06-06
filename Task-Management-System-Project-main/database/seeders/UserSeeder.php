<?php

namespace Database\Seeders;

use App\Models\AAUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        
        AAUser::create([
            'name'     => 'Admin User',
            'email'    => 'admin@test.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        
        AAUser::create([
            'name'     => 'Organizer User',
            'email'    => 'organizer@test.com',
            'password' => Hash::make('password'),
            'role'     => 'organizer',
        ]);

        
        AAUser::create([
            'name'     => 'Attendee User',
            'email'    => 'attendee@test.com',
            'password' => Hash::make('password'),
            'role'     => 'attendee',
        ]);
    }
}