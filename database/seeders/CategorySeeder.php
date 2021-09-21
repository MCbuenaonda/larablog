<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        for ($i=1; $i < 21; $i++) {
            Category::create(['name' => 'Categoria '.$i]);
        }
    }
}
