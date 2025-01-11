@extends('layouts.auth.auth-default')
@section('body-class', 'register-page')
@section('content')
    <div class="card">
        <div class="card-body register-card-body">
            <p class="register-box-msg">Resetar a senha</p>
            <form action="{{ route('password.update') }}" method="post">
                @csrf

                <input type="hidden" name="token" value="{{ request()->token }}">

                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <span class="bi bi-envelope "></span>
                    </div>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           placeholder="E-mail"
                           value="{{ old('email', request()->email) }}"/>
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
                            <button type="submit" class="btn btn-primary">Resetar senha</button>
                        </div>
                    </div>
                </div>
            </form>

            <p class="mb-0 text-center mt-2">
                <a href="{{ route('login') }}" class="text-center text-decoration-none fs-7"> Voltar ao login</a>
            </p>
        </div>
    </div>
@endsection

