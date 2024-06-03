@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mt-4 ms-3">Lista de compras</h2>
        </div>
        <div class="col-12">
            <a href="/compras/create" class="btn btn-success mt-3 ms-3">Nueva Compra</a>
        </div>
        <div class="col-12">
            <div class="mt-3 table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>IMAGEN</th>
                            <th>PRODUCTO</th>
                            <th>CANTIDAD</th>
                            <th>PRECIO</th>
                            <th>PROVEEDOR</th>
                            <th>FECHA DE COMPRA</th>
                            <th>ULTIMA ACTUALIZACION</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comprasList as $compras)
                            <tr>
                                <td>
                                    <img src="{{ asset($compras->GetProduct->img) }}"  width="75" alt="">
                                </td>
                                <td>{{ $compras->GetProduct->name }}</td>
                                <td>{{ $compras->quantity }}</td>
                                <td>${{ $compras->price }}</td>
                                <td>{{ $compras->GetSupplier->name }}</td>
                                <td>{{ $compras->create_date }}</td>
                                <td>{{ $compras->last_update }}</td>
                                <td>
                                    <a class="btn btn-warning mb-1" href="/compras/edit/ {{ $compras->id_purchasing }}" role="button">Editar</a>
                                    <a class="btn btn-danger mb-1" href="#" onclick="confirmDelete({{ $compras->id_purchasing }})" role="button">Eliminar</a>
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
    function confirmDelete(idcompra) {
            Swal.fire({
            title: '¿Estás seguro?',
            text: 'El registro será eliminado permanentemente',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/compras/delete/' + idcompra;
            }
        });
    }
</script>

@include('layouts.alerts')

@endsection