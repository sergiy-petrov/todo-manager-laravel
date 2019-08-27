<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(\App\Task::class, 50)->create();
    }
}
