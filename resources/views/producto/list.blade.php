@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mt-4 ms-3">Lista de productos</h2>
        </div>
        <div class="col-12">
            <a href="/producto/create" class="btn btn-success mt-3 ms-3">Nuevo Producto</a>
        </div>
        <div class="col-12">
            <div class="mt-3 table-responsive">
                <table id="productoTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>IMAGEN</th>
                            <th>SKU</th>
                            <th>NOMBRE</th>
                            <th id="categoryHeader" style="cursor:pointer">CATEGORIA</th>
                            <th>DESCRIPCION</th>
                            <th>FECHA DE REGISTRO</th>
                            <th>ULTIMA ACTUALIZACION</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productoList as $producto)
                            <tr>
                                <td>
                                    <img src="{{ asset($producto->img) }}"  width="75" alt="">
                                </td>
                                <td>{{ $producto->code }}</td>
                                <td>{{ $producto->name }}</td>
                                <td>{{ $producto->GetCategory->name }}</td>
                                <td>{{ $producto->description }}</td>
                                <td>{{ $producto->create_date }}</td>
                                <td>{{ $producto->last_update }}</td>
                                <td>
                                    <a class="btn btn-warning mb-1" href="/producto/edit/ {{$producto->id_product}}" role="button">Editar</a>
                                    <a class="btn btn-danger mb-1" href="#" role="button" onclick="confirmDelete({{ $producto->id_product }})">Eliminar</a>
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
    function confirmDelete(idproduct) {
            Swal.fire({
            title: '¿Estás seguro?',
            text: 'El registro será eliminado permanentemente',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/producto/delete/' + idproduct;
            }
        });
    }
</script>

<!-- Evento para ordenar las categorias alfabeticamente -->
<script>
    $(document).ready(function(){
        $('#categoryHeader').click(function(){
            var rows = $('#productoTable tbody tr').get();
    
            rows.sort(function(a, b) {
                var A = $(a).children('td').eq(3).text().toUpperCase();
                var B = $(b).children('td').eq(3).text().toUpperCase();
    
                if(A < B) {
                    return -1;
                }
    
                if(A > B) {
                    return 1;
                }
    
                return 0;
            });
    
            $.each(rows, function(index, row) {
                $('#productoTable').children('tbody').append(row);
            });
        });
    });
</script>

@include('layouts.alerts')

@endsection