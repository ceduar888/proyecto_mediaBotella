
<!-- Sweetalerts para control de excepciones al insertar y editar datos -->
@if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: '{{ $errors->first() }}'
            });
        </script>
@endif