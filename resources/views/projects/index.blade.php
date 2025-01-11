@extends('layouts.app.app-default')

@section('content')
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Projetos</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard.index') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.index') }}">Usuários</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('skill.index', $user->id) }}">Skills</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Projetos</li>
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
                        <span class="align-middle">Usuário: {{ $user->name }}</span>
                    </div>
                    <div>
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                           data-bs-target="#projectCreate{{ $user->id }}">Adicionar</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        @if($user->projects->count())
                            <thead>
                            <tr>
                                <th>Projeto</th>
                                <th>Categoria</th>
                                <th class="w-10 text-center ">Ações</th>
                            </tr>
                            </thead>
                        @endif
                        <tbody>
                        @forelse($user->projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->category  }}</td>
                                <td class="w-10 text-center">

                                    <div class="dropdown">
                                        <button class="btn btn-outline-dark border-0" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                   href="{{ route('gallery.index', $project->id) }}">Galeria</a></li>

                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                   data-bs-target="#projectUpdate{{ $project->id }}">Editar</a></li>

                                            <li>
                                                <form action="{{ route('project.destroy', $project->id) }}"
                                                      method="POST">
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
                            <div class="alert alert-warning" role="alert">Nenhum projeto encontrado</div>
                        @endforelse
                    </table>
                </div>
            </div>
            <div class="mt-3">
                {{ $projects->onEachSide(0)->links() }}
            </div>

        </div>
        @include('projects.modal.store')
        @include('projects.modal.update')
    </div>

@endsection


