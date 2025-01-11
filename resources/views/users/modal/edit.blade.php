<!-- Modal -->
@foreach($users as $user)
    <div class="modal fade" id="userEdit{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid px-3">
                        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data"
                              class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-md-8">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Nome completo"
                                       value="{{ old('name', $user->name) }}"/>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="nickname" class="form-label">Apelido</label>
                                <input type="text" name="nickname"
                                       class="form-control @error('nickname') is-invalid @enderror"
                                       placeholder="Apelido"
                                       value="{{ old('nickname', $user->nickname) }}"/>
                                @error('nickname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-8">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Melhor e-mail"
                                       value="{{ old('email', $user->email) }}"/>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="fone" class="form-label">Telefone</label>
                                <input type="text" name="fone" class="form-control @error('fone') is-invalid @enderror"
                                       placeholder="Telefone"
                                       value="{{ old('fone', $user->fone) }}"/>
                                @error('fone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="image" class="form-label">Imagem</label>
                                <input type="file" name="image"
                                       class="form-control @error('image') is-invalid @enderror"
                                       value="{{ old('image', $user->image) }}"
                                       placeholder="Imagem">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label">Nova senha</label>
                                <input type="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Nova senha">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirmar nova senha</label>
                                <input type="password" name="password_confirmation"
                                       class="form-control"
                                       placeholder="Confirmar nova senha">
                            </div>
                            <div class="d-flex  justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary btn-sm">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach

