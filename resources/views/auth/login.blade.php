@extends('layouts.auth.auth-default')
@section('body-class', 'login-page')
@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Faça login para inciar sua sessão</p>

            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-text"><span class="bi bi-envelope"></span></div>
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
                <!--begin::Row-->
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </form>
            <!-- /.social-auth-links -->
            <p class="mb-1 text-center mt-2 fs-7"><a href="{{ route('password.request') }}"
                                                     class="text-decoration-none">Esqueceu
                    seu
                    senha?</a></p>
            {{--            <p class="mb-0 text-center fs-7">--}}
            {{--                <a href="{{ route('register') }}" class="text-decoration-none"> Registrar um novo membro </a>--}}
            {{--            </p>--}}
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
