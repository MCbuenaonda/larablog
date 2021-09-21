@csrf

<div class="form-group row">
    <div class="col-sm-12">
        <label for="title" class="col-sm-1-12 col-form-label">Titulo</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="" value="{{ old('title', $post->title) }}">
        {{-- @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
    </div>
</div>

<fieldset class="form-group row">
    <legend class="col-form-legend col-sm-1-12">Group name</legend>
    <div class="col-sm-12">
        <label for="url_clean" class="col-sm-1-12 col-form-label">Url limpia</label>
        <input type="text" class="form-control" name="url_clean" id="url_clean" placeholder="" value="{{ old('url_clean', $post->url_clean) }}">

        <div class="form-group">
            <label for="exampleFormControlSelect1">Categoria</label>
            <select class="form-control" id="category_id" name="category_id">
                @foreach ($categories as $category => $id)
                    <option {{$post->category_id == $id ? 'selected' : '' }} value="{{ $id }}">{{$category}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Posteado</label>
            <select class="form-control" id="posted" name="posted">
                @include('dashboard.partials.option-yes-no', ['val' => $post->posted])
            </select>
        </div>


        <label for="content">Contenido</label>
        <div class="form-group">
            <textarea class="form-control" name="content" id="content" rows="3">{{ old('content', $post->content) }}</textarea>
        </div>
    </div>
</fieldset>
<div class="form-group row">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">Enviar datos</button>
    </div>
</div>





