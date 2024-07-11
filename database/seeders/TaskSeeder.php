<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Task::create([
            'title' => $faker->sentence,
            'description' => $faker->paragraph,
        ]);
    }
}
