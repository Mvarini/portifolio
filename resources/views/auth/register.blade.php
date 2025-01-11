@extends('layouts.auth.auth-default')
@section('body-class', 'register-page')
@section('content')
    <div class="card">
        <div class="card-body register-card-body">
            <p class="register-box-msg">Cadastrar um novo membro</p>
            <x-alert/>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <span class="bi bi-person "></span>
                    </div>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           placeholder="Nome completo"
                           value="{{ old('name') }}"/>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <span class="bi bi-envelope "></span>
                    </div>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           placeholder="E-mail"
                           value="{{ old('email') }}"/>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           placeholder="Senha"/>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Confirmar senha"/>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </form>

            <p class="mb-0 text-center mt-2">
                <a href="{{ route('login') }}" class="text-center text-decoration-none"> Eu sou membro! </a>
            </p>
        </div>
    </div>
@endsection
