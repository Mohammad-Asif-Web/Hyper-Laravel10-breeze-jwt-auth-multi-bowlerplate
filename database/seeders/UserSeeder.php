<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'phone'     => '0168225812',
                'role' => 'admin',
            ],
            [
                'name' => 'asif',
                'email' => 'asif@gmail.com',
                'password' => Hash::make('12345678'),
                'phone'     => '0168225214',
                'role' => 'user',
            ],
            [
                'name' => 'maria',
                'email' => 'maria@gmail.com',
                'password' => Hash::make('12345678'),
                'phone'     => '0168225888',
                'role' => 'user',
            ],
            [
                'name' => 'sajid',
                'email' => 'sajid@gmail.com',
                'password' => Hash::make('12345678'),
                'phone'     => '0168225222',
                'role' => 'user',
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }

    }
}
