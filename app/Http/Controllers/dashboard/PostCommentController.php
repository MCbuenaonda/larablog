<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostCommentController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'rol.admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $postComments = PostComment::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.post-comment.index', ['postComments' => $postComments]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PostComment $postComment) {
        return view('dashboard.post-comment.show', ['postComment' => $postComment]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostComment $postComment) {
        $postComment->delete();
        return redirect()->action([PostCommentController::class, 'index'])->with('status', 'Data deteted!');
    }


    public function post(Post $post) {
        $posts = Post::all();
        $postComments = PostComment::orderBy('created_at', 'desc')->where('post_id','=',$post->id)->paginate(10);
        return view('dashboard.post-comment.index', ['postComments' => $postComments, 'posts' => $posts, 'post' => $post]);
    }

    public function jshow(PostComment $postComment) {
        return response()->json($postComment);
        // return view('dashboard.post-comment.show', ['postComment' => $postComment]);
    }

    public function process(PostComment $postComment) {
        if ($postComment->approved == '0') {
            $postComment->approved = '1';
        }else{
            $postComment->approved = '0';
        }

        $postComment->save();

        return response()->json($postComment->approved);
    }


}
