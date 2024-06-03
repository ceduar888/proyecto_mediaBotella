@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mt-4 ms-3">Lista de Ordenes</h2>
        </div>
        <div class="col-12">
            <a href="/orden/management" class="btn btn-primary mt-3 ms-3">Gestionar Ordenes</a>
        </div>
        <div class="col-12">
            <div class="mt-3 table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ORDEN Nº</th>
                            <th>ESTADO</th>
                            <th>TOTAL</th>
                            <th>CLIENTE</th>
                            <th>DIRECCIÓN DE ENTREGA</th>
                            <th>FECHA ORDEN</th>
                            <th>ULTIMA ACTUALIZACION</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordenList as $orden)
                            <tr>
                                <td>{{ $orden->id_order }}</td>
                                <td>{{ $orden->status }}</td>
                                <td>{{ $orden->total }}</td>
                                <td>{{ $orden->GetUser->first_name }} {{ $orden->GetUser->last_name }}</td>
                                <td>{{ $orden->delivery_address }}</td>
                                <td>{{ $orden->create_date }}</td>
                                <td>{{ $orden->last_update }}</td>
                                <td>
                                    <a class="btn btn-success mb-1" href="#" role="button">Editar</a>
                                    <a class="btn btn-danger mb-1" href="#" role="button">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('layouts.alerts')

@endsection