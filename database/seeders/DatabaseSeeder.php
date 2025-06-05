<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Ferramentas',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Livros',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Eletrônicos',
        ]);
    }
}
