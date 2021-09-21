@extends('dashboard.template')

@section('content')
    <div class="container">
        <h1>Show</h1>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="title" class="col-sm-1-12 col-form-label">Titulo</label>
                <input readonly  type="text" class="form-control" name="title" id="title" placeholder="" value="{{ $post->title }}">
            </div>
        </div>
        <fieldset class="form-group row">
            <legend class="col-form-legend col-sm-1-12">Group name</legend>
            <div class="col-sm-12">
                <label for="url_clean" class="col-sm-1-12 col-form-label">Url limpia</label>
                <input readonly type="text" class="form-control" name="url_clean" id="url_clean" placeholder="" value="{{ $post->url_clean }}">

                <label for="content">Contenido</label>
                <div class="form-group">
                    <textarea readonly class="form-control" name="content" id="content" rows="3">{{ $post->content }}</textarea>
                </div>
            </div>
        </fieldset>

        @if (isset($post->image))
            <img src="{{ asset('images/'.$post->image->image) }}" class="img-fluid" alt="">
        @endif
    </div>
@endsection

{{-- ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} --}}
