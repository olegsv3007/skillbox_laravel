<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('123')
        ]);

        DB::table('user_role')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
