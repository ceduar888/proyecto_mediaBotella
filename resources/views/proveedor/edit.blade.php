@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="mt-5 ms-3 text-center">Actualizar Proveedores</h2>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
            <form action="/proveedor/edit/ {{$proveedor->id_supplier}}" method="POST" class="mt-3 ms-3">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$proveedor->name}}">
                    <div id="message" class="form-text">Segun NIT</div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Direccion</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{$proveedor->address}}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefono</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="2222-2222" value="{{$proveedor->phone}}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success mt-3">Guardar</button>
                    <a class="btn btn-primary mt-3 ms-2" href="/proveedor/list" role="button">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.exceptions')

@include('layouts.alerts')

@endsection