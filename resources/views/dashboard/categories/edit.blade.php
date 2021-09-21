@extends('dashboard.template')

@section('content')
    @include('dashboard.partials.validation-error')

    <div class="container">
        <h1>Edit</h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @method('PUT')
            @include('dashboard.categories._form')
        </form>
    </div>
@endsection

