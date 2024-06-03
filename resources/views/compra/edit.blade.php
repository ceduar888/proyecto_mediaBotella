@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="mt-5 ms-3 text-center">Registro de compras</h2>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
            <form action="/compras/edit/ {{$compras->id_purchasing}}" method="POST" class="mt-3 ms-3">
                @csrf
                <div class="mb-3">
                    <label for="proveedor">Proveedor</label>
                    <select class="form-select" name="proveedor" id="proveedor">
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id_supplier }}" {{ $proveedor->id_supplier == $compras->id_supplier ? 'selected' : ''}}>
                                {{ $proveedor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="producto">Producto</label>
                    <select class="form-select" name="producto" id="producto">
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id_product }}" {{ $producto->id_product == $compras->id_product ? 'selected' : '' }}>
                                {{ $producto->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $compras->quantity }}">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" id="precio" name="precio" value="{{ $compras->price }}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success mt-3">Guardar</button>
                    <a class="btn btn-primary mt-3 ms-2" href="/compras/list" role="button">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.exceptions')

@include('layouts.alerts')

@endsection