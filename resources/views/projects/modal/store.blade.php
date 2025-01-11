<!-- Modal -->
@push('scripts')

    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/8ksjyh7ohpqhmd8ra5pzxfwszl9ohlmwx9wwnxah4sn9xwvi/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: [
                // Core editing features
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                // Your account includes a free trial of TinyMCE premium features
                // Try the most popular premium features until Jan 22, 2025:
                'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
@endpush

<div class="modal fade" id="projectCreate{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Projeto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-3">
                    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data"
                          class="row g-3">
                        @csrf
                        @method('POST')

                        <input type="hidden" name="user_id" value="{{ $user->id }}"/>

                        <div class="col-md-9">
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

                        <div class="col-md-3">
                            <label for="date_at" class="form-label">Data</label>
                            <input type="text" name="date_at"
                                   class="form-control date @error('date_at') is-invalid @enderror"
                                   placeholder="Data"
                                   value="{{ old('date_at', date('d/m/Y')) }}"/>
                            @error('date_at')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="client" class="form-label">Cliente</label>
                            <input type="text" name="client"
                                   class="form-control @error('client') is-invalid @enderror"
                                   placeholder="Cliente"
                                   value="{{ old('client') }}"/>
                            @error('client')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-8">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" name="url"
                                   class="form-control @error('url') is-invalid @enderror"
                                   placeholder="URL do projeto"
                                   value="{{ old('url') }}"/>
                            @error('url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="category" class="form-label">Categoria</label>
                            <select name="category" class="form-select @error('category') is-invalid @enderror">
                                <option value="">Selecione a categoria</option>
                                @foreach($categories as $category)
                                    <option
                                        {{ old('category') == $category ? "selected" : "" }} value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-8">
                            <label for="cover" class="form-label">Capa</label>
                            <input type="file" name="cover"
                                   class="form-control @error('cover') is-invalid @enderror"
                                   value="{{ old('cover') }}"
                                   placeholder="Capa do projeto">
                            @error('cover')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label">Descrição</label>
                            <textarea name="description" rows="4"
                                      class="form-control @error('description') is-invalid @enderror"
                                      placeholder="Descrição">{{ old('description') }}</textarea>
                            @error('description')
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


