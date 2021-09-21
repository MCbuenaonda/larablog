@extends('dashboard.template')

@section('content')
    @include('dashboard.partials.validation-error')

    <div class="container">
        <h1>Edit</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @method('PUT')
            @include('dashboard.users._form')
        </form>
    </div>
@endsection

