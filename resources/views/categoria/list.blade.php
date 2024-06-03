@extends('layouts.app')

@section('content')
 
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="ms-3">Categoria de productos</h2>
        </div>
        <div class="col-12">
            <a href="/categoria/create" class="btn btn-success ms-3 mt-3">Nueva Categoria</a>
        </div>
        <div class="col-12 mt-3">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>NOMBRE</th>
                            <th>FECHA DE REGISTRO</th>
                            <th>ULTIMA ACTUALIZACION</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($categoriaList as $categoria)
                         <tr>
                            <td>{{ $categoria->id_category }}</td>
                            <td>{{ $categoria->name }}</td>
                            <td>{{ $categoria->create_date }}</td>
                            <td>{{ $categoria->last_update }}</td>
                            <td>
                                <a class="btn btn-warning me-2" href="/categoria/edit/ {{$categoria->id_category}}" role="button">Editar</a>
                                <a class="btn btn-danger" href="#" role="button" onclick="confirmDelete({{ $categoria->id_category }})">Eliminar</a>
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
    function confirmDelete(idcategory) {
            Swal.fire({
            title: '¿Estás seguro?',
            text: 'El registro será eliminado permanentemente',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/categoria/delete/' + idcategory;
            }
        });
    }
</script>

@include('layouts.alerts')

@endsection