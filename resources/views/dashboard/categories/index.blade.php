@extends('dashboard.template')

@section('content')

<a href="{{ route('categories.create') }}" class="btn btn-dark my-3">Crear</a>

<table class="table table-striped">
    <thead class="bg-dark text-white">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Creacion</th>
            <th>Actualizacion</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at->format('d-M-Y') }}</td>
                <td>{{ $category->updated_at->format('d-M-Y') }}</td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-success">Ver</a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Editar</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $category->id }}">Borrar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $categories->links() }}

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
                <form id="frmDelete" action="{{ route('categories.destroy', 0) }}" data-action="{{ route('categories.destroy', 0) }}" method="POST">
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
