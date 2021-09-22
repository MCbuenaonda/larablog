<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use App\Helpers\CustomUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorePostsPost;
use App\Http\Requests\UpdatePostsPost;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);

        // $this->middleware('auth');
        // $this->middleware('auth')->only('index');
        // $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->sendMail();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id', 'name');
        return view('dashboard.posts.create', ['post' => new Post(), 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostsPost $request)
    {
        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'content' => 'required',
        // ]);
        // $input = $request->all();
        // $titulo = $request->input('title');
        // $titulo = $request->title;
        $urlSlug = CustomUrl::url_slug($request->title);

        $requestData = $request->validated();
        $requestData['url_clean'] = $urlSlug;

        $validator = Validator::make($requestData, StorePostsPost::myRules());

        if ($validator->fails()) {
            return redirect('dashboard/posts/create')->withErrors($validator)->withInput();
        }

        Post::create($requestData);
        return redirect()->action([PostController::class, 'create'])->with('status', 'Data saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        return view('dashboard.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'name');
        return view('dashboard.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsPost $request, Post $post)
    {
        $requestData = $request->validated();
        $requestData['url_clean'] = CustomUrl::url_slug($request->title);
        $post->update($requestData);
        return redirect()->action([PostController::class, 'index'])->with('status', 'Data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->action([PostController::class, 'index'])->with('status', 'Data deteted!');
    }

    public function image(Request $request, Post $post)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:10240' //10Mb
        ]);

        $filename = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $filename);

        PostImage::create([
            'image' => $filename,
            'post_id' => $post->id
        ]);

        return redirect()->action([PostController::class, 'create'])->with('status', 'Image saved!');
    }

    /**
     * para subir imegen del ck editor
     */
    public function contentImage(Request $request) {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:10240' //10Mb
        ]);

        $filename = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $filename);

        return response()->json(['default' => URL::to('/').'images/'.$filename]);
    }

    private function sendMail() {
        $data['title'] = 'Titulo mail';

        Mail::send('emails.email', $data, function ($message) {
            $message->from('ing.mcbuenaonda@gmail.com', 'Carlos Glez');
            $message->sender('john@johndoe.com', 'John Doe');
            $message->to('ing.carlos.cerati@gmail.com', 'Carlos Glez');
            // $message->cc('john@johndoe.com', 'John Doe');
            // $message->bcc('john@johndoe.com', 'John Doe');
            $message->replyTo('carlos_cerati@icg.com', 'John Doe');
            $message->subject('Gracias por la weed');
            // $message->priority(3);
            // $message->attach('pathToFile');
        });

        if (Mail::failures()) {
            return 'mensaje no enviado';
        }else{
            return 'mensaje enviado';
        }
    }
}
