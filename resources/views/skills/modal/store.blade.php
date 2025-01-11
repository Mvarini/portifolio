<!-- Modal -->
<div class="modal fade" id="skillCreate" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Skill</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-3">
                    <form action="{{ route('skill.store', $user->id) }}" method="POST" enctype="multipart/form-data"
                          class="row g-3">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ $user->id }}"/>

                        <div class="col-12">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Nome"
                                   value="{{ old('name') }}"/>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="category" class="form-label">Categoria</label>
                            <select name="category" class="form-select">
                                <option value="">Selecione a categoria</option>
                                @foreach($categories as $category)
                                    <option
                                        {{ old('category') == $category ? "selected" : "" }} value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="image" class="form-label">Imagem</label>
                            <input type="file" name="image"
                                   class="form-control @error('image') is-invalid @enderror"
                                   value="{{ old('image') }}"
                                   placeholder="Imagem">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="d-flex  justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

