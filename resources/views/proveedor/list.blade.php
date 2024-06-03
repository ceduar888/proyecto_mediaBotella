@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mt-4 ms-3">Lista de proveedores</h2>
        </div>
        <div class="col-12">
            <a href="/proveedor/create" class="btn btn-success mt-3 ms-3">Nuevo Proveedor</a>
        </div>
        <div class="col-12">
            <div class="mt-3 table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>DIRECCION</th>
                            <th>TELEFONO</th>
                            <th>FECHA DE REGISTRO</th>
                            <th>ULTIMA ACTUALIZACION</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proveedorList as $proveedor)
                            <tr>
                                <td>{{ $proveedor->name }}</td>
                                <td>{{ $proveedor->address }}</td>
                                <td>{{ $proveedor->phone }}</td>
                                <td>{{ $proveedor->create_date }}</td>
                                <td>{{ $proveedor->last_update }}</td>
                                <td>
                                    <a class="btn btn-warning mb-1" href="/proveedor/edit/ {{$proveedor->id_supplier}}" role="button">Editar</a>
                                    <a class="btn btn-danger mb-1" href="#" role="button" onclick="confirmDelete({{ $proveedor->id_supplier }})"">Eliminar</a>
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
    function confirmDelete(idproveedor) {
            Swal.fire({
            title: '¿Estás seguro?',
            text: 'El registro será eliminado permanentemente',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/proveedor/delete/' + idproveedor;
            }
        });
    }
</script>

@include('layouts.alerts')

@endsection