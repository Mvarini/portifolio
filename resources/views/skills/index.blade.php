@extends('layouts.app.app-default')
@section('content')
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Skill</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard.index') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.index') }}">Usuários</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>

    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->

            <x-alert/>

            <div class="card">
                <div class="card-header d-flex">
                    <div class="flex-grow-1">
                        <span class="align-middle">{{ $user->name }}</span>
                    </div>
                    <div>
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                           data-bs-target="#skillCreate">Adicionar</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Criação</th>
                            <th class="w-10 text-center ">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($skills as $skill)
                            <tr>
                                <td>{{ $skill->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($skill->created_at)->format('d/m/Y') }}</td>
                                <td class="w-10 text-center">

                                    <div class="dropdown">
                                        <button class="btn btn-outline-dark border-0" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                   data-bs-target="#skillUpdate{{ $skill->id }}">Editar</a></li>

                                            <li>
                                                <form action="{{ route('skill.destroy', $skill->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">Excluir</button>
                                                </form>
                                            </li>

                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @empty
                        @endforelse
                    </table>
                </div>
            </div>
            <div class="mt-3">
                {{ $skills->onEachSide(0)->links() }}
            </div>

        </div>
        @include('skills.modal.store')
        @include('skills.modal.update')
    </div>

@endsection

