<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // default admin user
        factory(\App\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@todo.loc',
            'password' => Hash::make('password'),
        ]);

        factory(\App\User::class, 10)->create();
    }
}
