<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmin extends Migration
{
    public function up()
    {
        DB::table('users')->insert([
            'name' => 'AdminFromMigration',
            'email' => 'adminFromMigration@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('123')
        ]);

        DB::table('roles')->insert([
            'name' => 'administrator'
        ]);

        DB::table('user_role')->insert([
            'user_id' => \App\User::where('email', 'adminFromMigration@example.com')->firstOrFail()->id,
            'role_id' => \App\Role::where('name', 'administrator')->firstOrFail()->id,
        ]);
    }

    public function down()
    {
        \App\User::where('email', 'adminFromMigration@example.com')->firstOrFail()->delete();
    }
}
