@extends('dashboard.template')

@section('content')

<a href="{{ route('posts.create') }}" class="btn btn-dark my-3">Crear</a>

<table class="table table-striped">
    <thead class="bg-dark text-white">
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>Posteado</th>
            <th>Creacion</th>
            <th>Actualizacion</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->posted }}</td>
                <td>{{ $post->created_at->format('d-M-Y') }}</td>
                <td>{{ $post->updated_at->format('d-M-Y') }}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">Ver</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Editar</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $post->id }}">Borrar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links() }}

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>¿ Desea borrar el registro definitivamente ? </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form id="frmDelete" action="{{ route('posts.destroy', 0) }}" data-action="{{ route('posts.destroy', 0) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        $('#deleteModal').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget) // Button that triggered the modal
            const id = button.data('id');
            const action = $('#frmDelete').attr('data-action').slice(0,-1) + id;
            $('#frmDelete').attr('action', action);

            var modal = $(this)
            modal.find('.modal-title').text('Se elimanara el registro ' + id)
        });
    }
</script>

@endsection
