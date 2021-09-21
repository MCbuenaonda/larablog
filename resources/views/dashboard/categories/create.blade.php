@extends('dashboard.template')

@section('content')
    @include('dashboard.partials.validation-error')

    <div class="container">
        <h1>Create</h1>

        <form action="{{ route('categories.store') }}" method="post">
            @include('dashboard.categories._form')
        </form>
    </div>
@endsection

