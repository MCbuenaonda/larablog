@extends('dashboard.template')

@section('content')
    @include('dashboard.partials.validation-error')

    <div class="container">
        <h1>Create</h1>

        <form action="{{ route('users.store') }}" method="post">
            @include('dashboard.users._form')
        </form>
    </div>
@endsection

