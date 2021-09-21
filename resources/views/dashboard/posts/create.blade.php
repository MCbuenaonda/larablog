@extends('dashboard.template')

@section('content')
    @include('dashboard.partials.validation-error')

    <div class="container">
        <h1>Create</h1>

        <form action="{{ route('posts.store') }}" method="post">
            @include('dashboard.posts._form')
        </form>
    </div>
@endsection

