@extends('dashboard.template')

@section('content')
    <div class="container">
        <h1>Show</h1>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="name" class="col-sm-1-12 col-form-label">Nombre</label>
                <input readonly  type="text" class="form-control" name="name" id="name" placeholder="" value="{{ $user->name }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="rol" class="col-sm-1-12 col-form-label">Rol</label>
                <input readonly  type="text" class="form-control" name="rol" id="rol" placeholder="" value="{{ $user->rol->key }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="email" class="col-sm-1-12 col-form-label">Email</label>
                <input readonly  type="text" class="form-control" name="email" id="email" placeholder="" value="{{ $user->email }}">
            </div>
        </div>
    </div>
@endsection
