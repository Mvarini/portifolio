@extends('layouts.app.app-default')
@section('content')
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Galeria</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard.index') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.index') }}">Usuários</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page"><a
                                href="{{ route('project.index', $project->user_id) }}">Projetos</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Galeria</li>
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
                        <span class="align-middle">Projeto: {{ $project->name }}</span>
                    </div>
                    <div>
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                           data-bs-target="#createGallery">Adicionar</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        @if($project->galleries->count())
                            <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>Cliente</th>
                                <th class="w-10 text-center ">Ações</th>
                            </tr>
                            </thead>
                        @endif
                        <tbody>
                        @forelse($project->galleries  as $gallery)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $gallery->image) }}" alt=""
                                         class="img-fluid"
                                         width="50"/>
                                </td>
                                <td>{{ $gallery->project->name }}</td>
                                <td class="w-10 text-center">

                                    <div class="dropdown">
                                        <button class="btn btn-outline-dark border-0" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                   data-bs-target="#updateGallery{{ $gallery->id }}">Editar</a></li>

                                            <li>
                                                <form action="{{ route('gallery.destroy', $gallery->id) }}"
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
                            <div class="alert alert-warning" role="alert">Nenhum imagem encontrada</div>
                        @endforelse
                    </table>
                </div>
            </div>
            <div class="mt-3">
                {{--                {{ $projects->onEachSide(0)->links() }}--}}
            </div>
        </div>
        @include('projects_gallery.modal.store')
        @include('projects_gallery.modal.update')
    </div>

@endsection
