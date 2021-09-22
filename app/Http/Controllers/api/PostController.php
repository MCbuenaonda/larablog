<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends ApiResponseController
{


    public function index() {
        $posts = Post::leftjoin('post_images', 'post_images.post_id', '=', 'posts.id')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->select('posts.*', 'categories.name as category', 'post_images.image')
        ->orderBy('posts.created_at', 'desc')
        ->where('posted', 'yes')->paginate(10);

        return $this->successResponse($posts);
    }

    public function all() {
        $posts = Post::leftjoin('post_images', 'post_images.post_id', '=', 'posts.id')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->select('posts.*', 'categories.name as category', 'post_images.image')
        ->orderBy('posts.created_at', 'desc')->get(); //paginate(10);

        return $this->successResponse($posts);
    }


    public function show(Post $post) {
        $post->image;
        $post->category;
        return $this->successResponse($post);
        // return response()->json([ 'data' => $post, 'code' => 200, 'msg' => true ]);
    }

    public function category(Category $category) {
        $posts = Post::leftjoin('post_images', 'post_images.post_id', '=', 'posts.id')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->select('posts.*', 'categories.name as category', 'post_images.image')
        ->orderBy('posts.created_at', 'desc')
        ->where('categories.id', $category->id)->paginate(10);

        return $this->successResponse(['post' => $posts, 'category' => $category]);

        // return $this->successResponse(['post' => $category->post()->paginate(10), 'category' => $category]);
    }

    public function url_clean(String $url_clean) {
        $post = Post::where('url_clean', $url_clean)->firstOrFail();
        $post->image;
        $post->category;
        return $this->successResponse($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
