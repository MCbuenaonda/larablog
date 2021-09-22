@extends('dashboard.template')

@section('content')

<div class="col-6 mb-3">
    <form id="filter-frm" action="{{ route('post-comment.post', $post)}}">
        <div class="form-row">
            <div class="col-10">
                <select name="" id="filterPost" class="form-control">
                    @foreach ($posts as $p)
                        <option value="{{$p->id}}" {{$post->id == $p->id ? 'selected' : ''}}>{{$p->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </div>
    </form>
</div>

@if (count($postComments) > 0)
    <table class="table table-striped">
        <thead class="bg-dark text-white">
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Aprovado</th>
                <th>Usuario</th>
                <th>Creacion</th>
                <th>Actualizacion</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($postComments as $postComment)
                <tr>
                    <td>{{ $postComment->id }}</td>
                    <td>{{ $postComment->title }}</td>
                    <td>{{ $postComment->approved }}</td>
                    <td>{{ $postComment->user->name }}</td>
                    <td>{{ $postComment->created_at->format('d-M-Y') }}</td>
                    <td>{{ $postComment->updated_at->format('d-M-Y') }}</td>
                    <td>
                        <a href="{{ route('post-comment.show', $postComment->id) }}" class="btn btn-success">Ver</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $postComment->id }}">Borrar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $postComments->links() }}

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
                    <form id="frmDelete" action="{{ route('post-comment.destroy', 0) }}" data-action="{{ route('post-comment.destroy', 0) }}" method="POST">
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
@else
    <div class="text-center">
        <h3 class="mt-5">Sin comentarios en el post</h3>
    </div>

@endif

<script>
    window.onload = function(){
        $('#filterPost').change(function() {
            let action = $('#filter-frm').attr('action');
            let regex = new RegExp('/[0-9]+/');
            let urlaction = action.replace(regex, '/'+$(this).val()+'/');
            console.log(urlaction);
            $('#filter-frm').attr('action', urlaction);
        })
    }
</script>


@endsection
