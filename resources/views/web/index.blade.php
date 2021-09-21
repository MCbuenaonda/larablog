@extends('web.template')

@section('content')
    <div class="mt-3">
        {{-- <p> @{{ message }} </p> --}}

        <router-view></router-view>
    </div>

@endsection
