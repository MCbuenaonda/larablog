<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        $categories = Category::all();

        foreach ($categories as $key => $category) {
            for ($i=1; $i < 21; $i++) {
                Post::create([
                    'title' => 'Titulo '.$i,
                    'url_clean' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', 'Titulo '.$i))),
                    'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis similique fugiat consequatur deserunt eos sed numquam amet. Aliquam, et. Totam quae temporibus, nulla unde consequuntur quam aliquid neque. Iste, placeat.',
                    'posted' => 'yes',
                    'category_id' => $category->id
                ]);
            }
        }
    }
}
