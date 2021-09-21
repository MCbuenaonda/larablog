@extends('dashboard.template')

@section('content')
    <div class="container">
        <h1>Show</h1>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="name" class="col-sm-1-12 col-form-label">Nombre</label>
                <input readonly  type="text" class="form-control" name="name" id="name" placeholder="" value="{{ $category->name }}">
            </div>
        </div>
    </div>
@endsection

