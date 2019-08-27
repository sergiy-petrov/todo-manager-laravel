<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(\App\User::class, 10)->create();
    }
}
