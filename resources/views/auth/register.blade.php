@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-3">Registrate</h2>
            <div class="card my-3">
                <form action="{{ route('register') }}" method="POST" class="card-body cardbody-color p-lg-5">
                @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus aria-describedby="emailHelp">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Minimo 8 caracteres" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password-confirm" placeholder="Minimo 8 caracteres" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="7777-7777" required>
                    </div>
                    <div class="mb-3 hidden">
                        <input type="number" class="form-control" id="id_role" name="id_role" required value="2">
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100 mt-4">{{ __('Register') }}</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
