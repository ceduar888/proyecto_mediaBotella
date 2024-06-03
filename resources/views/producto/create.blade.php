@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="mt-5 ms-3 text-center">Registro de Productos</h2>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
            <form action="/producto/create" method="POST" class="mt-3 ms-3" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">SKU</label>
                    <input type="text" class="form-control" name="code" id="code" placeholder="A0000-AZ">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripcion</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="category">Categoria</label>
                    <select class="form-select" name="category" id="category">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id_category }}">{{ $categoria->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" onchange="previewImage(event)">
                    <img id="preview" src="#" alt="Vista previa de la imagen" style="display: none; margin-top: 10px; max-width: 50%;">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success mt-3">Guardar</button>
                    <a class="btn btn-primary mt-3 ms-2" href="/producto/list" role="button">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
    
<!--Evento para vista previa de la imagen -->
<script>
function previewImage(event) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function() {
        const preview = document.getElementById('preview');
        preview.src = reader.result;
        preview.style.display = 'block';
    }
    if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@include('layouts.alerts')

@include('layouts.exceptions')

@endsection