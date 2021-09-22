<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Database\Seeder;

class PostCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostComment::truncate();

        $posts = Post::all()->where('id', '<=', 15);

        foreach ($posts as $key => $post) {
            for ($i=1; $i < ($key+1); $i++) {
                PostComment::create([
                    'title' => 'Titulo comentario '.$i.' del contenido '.$post->title,
                    'message' => 'Comentario Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis similique fugiat consequatur deserunt eos sed numquam amet.',
                    'user_id' => 1,
                    'post_id' => $post->id
                ]);
            }
        }
    }
}
