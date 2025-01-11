<!-- Modal -->
<div class="modal fade" id="createGallery" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Galeria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-3">
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data"
                          class="row g-3">
                        @csrf
                        @method('POST')

                        <input type="hidden" name="project_id" value="{{ $project->id }}"/>

                        <div class="col-12">
                            <label for="image" class="form-label">Capa</label>
                            <input type="file" name="image"
                                   class="form-control @error('image') is-invalid @enderror"
                                   value="{{ old('image') }}"
                                   placeholder="Capa do projeto">
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



