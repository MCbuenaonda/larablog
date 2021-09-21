@extends('dashboard.template')

@section('content')
    @include('dashboard.partials.validation-error')

    <div class="container">
        <h1>Edit</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @method('PUT')
            @include('dashboard.posts._form')
        </form>

        <form action="{{ route('posts.image', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary" btn-lg btn-block">Subir imagen</button>
                </div>
            </div>
        </form>
    </div>
@endsection

