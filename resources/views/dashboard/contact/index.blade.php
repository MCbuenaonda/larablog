@extends('dashboard.template')

@section('content')

<table class="table table-striped">
    <thead class="bg-dark text-white">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Creacion</th>
            <th>Actualizacion</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->lastname }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->created_at->format('d-M-Y') }}</td>
                <td>{{ $contact->updated_at->format('d-M-Y') }}</td>
                <td>
                    <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-success">Ver</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $contact->id }}">Borrar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $contacts->links() }}

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
                <form id="frmDelete" action="{{ route('contact.destroy', 0) }}" data-action="{{ route('contact.destroy', 0) }}" method="POST">
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
