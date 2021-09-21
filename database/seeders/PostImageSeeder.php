<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Database\Seeder;

class PostImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostImage::truncate();

        $posts = Post::all();

        foreach ($posts as $key => $post) {
            PostImage::create([
                'post_id' => $post->id,
                'image' => '1632003266.png'
            ]);
        }
    }
}
