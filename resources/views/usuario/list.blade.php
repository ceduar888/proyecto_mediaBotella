@extends('layouts.app')

@section('content')
 
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="ms-3">Lista de usuarios</h2>
        </div>
        <div class="col-12">
            <a href="/usuario/create" class="btn btn-success ms-3 mt-3">Crear Usuario</a>
        </div>
        <div class="col-12 mt-3">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>EMAIL</th>
                            <th>TELEFONO</th>
                            <th>ROL</th>
                            <th>FECHA DE REGISTRO</th>
                            <th>ULTIMA ACTUALIZACION</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($userList as $user)
                         <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->GetRole->name }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>
                                <a class="btn btn-danger" href="#" onclick="confirmDelete({{ $user->id}})" role="button">Eliminar</a>
                            </td>
                        </tr>
                         @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert para advertir el borrado de un registro. -->
<script>
    function confirmDelete(iduser) {
            Swal.fire({
            title: '¿Estás seguro?',
            text: 'El registro será eliminado permanentemente',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/usuario/delete/' + iduser;
            }
        });
    }
</script>

@include('layouts.alerts')

@endsection