@extends('layouts.auth.auth-default')
@section('body-class', 'login-page')
@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Receba o link por e-mail</p>

            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="post">
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
                <!--begin::Row-->
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Recuperar</button>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </form>
            <!-- /.social-auth-links -->
            <p class="mb-1 text-center mt-2 fs-7"><a href="{{ route('login') }}" class="text-decoration-none">Voltar ao
                    login</a></p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection

