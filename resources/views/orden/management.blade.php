@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mt-4 ms-3">Gestion de Ordenes</h2>
        </div>
        <div class="col-12">
            <a href="/orden/list" class="btn btn-primary mt-3 ms-3">Regresar</a>
        </div>
        <div class="col-12">
            <div class="mt-3 table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ORDEN Nº</th>
                            <th>ESTADO</th>
                            <th>TOTAL</th>
                            <th>CLIENTE</th>
                            <th>DIRECCIÓN DE ENTREGA</th>
                            <th>FECHA</th>
                            <th>ÚLTIMA ACTUALIZACIÓN</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordenList as $orden)
                            @if ($orden->status == 'Pendiente')
                                <tr>
                                    <td>{{ $orden->id_order }}</td>
                                    <td>{{ $orden->status }}</td>
                                    <td>{{ $orden->total }}</td>
                                    <td>{{ $orden->GetUser->name }}</td>
                                    <td>{{ $orden->delivery_address }}</td>
                                    <td>{{ $orden->create_date }}</td>
                                    <td>{{ $orden->last_update }}</td>
                                    <td>
                                        <a class="btn btn-success mb-1" href="#" role="button">Completada</a>
                                        <a class="btn btn-danger mb-1" href="#" role="button">No Entregada</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection