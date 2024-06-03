@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card my-2">
                <form action="{{ route('login') }}" class="card-body cardbody-color p-lg-5" method="POST">
                @csrf
                    <div class="text-center">
                        <img src="{{ asset('img/media-botella.png') }}" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" aria-describedby="emailHelp" placeholder="Correo" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Contraseña" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Ingresar</button></div>
                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">No estas registrado? <a href="{{ route('register') }}" class="text-dark fw-bold">Registrate</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection