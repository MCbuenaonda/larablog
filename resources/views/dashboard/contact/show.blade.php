@extends('dashboard.template')

@section('content')
    <div class="container">
        <h1>Show</h1>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="name" class="col-sm-1-12 col-form-label">Nombre</label>
                <input readonly  type="text" class="form-control" name="name" id="name" value="{{ $contact->name }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="lastname" class="col-sm-1-12 col-form-label">Titulo</label>
                <input readonly  type="text" class="form-control" name="lastname" id="lastname" value="{{ $contact->lastname }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="email" class="col-sm-1-12 col-form-label">Email</label>
                <input readonly  type="text" class="form-control" name="email" id="email" value="{{ $contact->email }}">
            </div>
        </div>

        <label for="message">Contenido</label>
        <div class="form-group">
            <textarea readonly class="form-control" name="message" id="message" rows="3">{{ $contact->message }}</textarea>
        </div>

        {{-- @if (isset($post->image))
            <img src="{{ asset('images/'.$post->image->image) }}" class="img-fluid" alt="">
        @endif --}}
    </div>
@endsection

{{-- ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} --}}
