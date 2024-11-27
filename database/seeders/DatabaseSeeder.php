<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Todo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(10)->create();
        User::factory()
            ->has(Category::factory(8))
                ->has(Todo::factory(8))
            ->create([
                'name' => 'Damiën',
                'email' => 'dovandenijssel@live.nl',
            ]);
        User::factory(rand(1, 10))
            ->has(Category::factory(12))
                ->has(Todo::factory(8))
            ->create();
    }
}
