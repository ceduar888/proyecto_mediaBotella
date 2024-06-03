@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="mt-5 ms-3 text-center">Editar categorías</h2>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
            <form action="/categoria/edit/ {{$categoria->id_category}}" method="POST" class="mt-3 ms-3">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre-cat" name="nombre-cat" value="{{$categoria->name}}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success mt-3">Guardar</button>
                    <a class="btn btn-primary mt-3 ms-2" href="/categoria/list" role="button">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.exceptions')

@include('layouts.alerts')

@endsection