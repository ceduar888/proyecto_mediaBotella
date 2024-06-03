@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="mt-5 ms-3 text-center">Registro de usuarios</h2>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
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
                <div class="mb-3">
                    <label for="role" class="form-label">Rol</label>
                    <select name="id_role" id="id_role" class="form-select">
                        @foreach ($roleList as $role)
                        <option value="{{ $role->id_role }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100 mt-4">{{ __('Register') }}</button></div>
            </form>
        </div>
    </div>
</div>

@endsection