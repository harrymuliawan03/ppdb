<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Administrator',
                'email'          => 'admin@smk3.co.id',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'image'          => 'https://via.placeholder.com/500',
                'password'       => bcrypt('admin123'),
                'remember_token' => bcrypt('admin123'),
                'created_at'     =>  date('Y-m-d H:i:s'),
                'updated_at'     => null,
                'deleted_at'     => null,
            ]
        ];

        User::insert($users);
    }
}
