<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\TagsSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PostImageSeeder;
use Database\Seeders\PostCommentsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(PostImageSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(PostCommentsSeeder::class);
        $this->call(TagsSeeder::class);

    }
}
