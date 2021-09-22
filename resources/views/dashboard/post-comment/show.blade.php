@extends('dashboard.template')

@section('content')
    <div class="container">
        <h1>Show</h1>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="title" class="col-sm-1-12 col-form-label">Nombre</label>
                <input readonly  type="text" class="form-control" name="title" id="title" value="{{ $postComment->title }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="user" class="col-sm-1-12 col-form-label">Usuario</label>
                <input readonly  type="text" class="form-control" name="user" id="user" value="{{ $postComment->user->name }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="approved" class="col-sm-1-12 col-form-label">Aprovado</label>
                <input readonly  type="text" class="form-control" name="approved" id="approved" value="{{ $postComment->approved }}">
            </div>
        </div>

        <label for="message">Contenido</label>
        <div class="form-group">
            <textarea readonly class="form-control" name="message" id="message" rows="3">{{ $postComment->message }}</textarea>
        </div>

        {{-- @if (isset($post->image))
            <img src="{{ asset('images/'.$post->image->image) }}" class="img-fluid" alt="">
        @endif --}}
    </div>
@endsection

{{-- ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} --}}
