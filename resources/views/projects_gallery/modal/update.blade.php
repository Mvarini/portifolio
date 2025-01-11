<!-- Modal -->
@foreach($project->galleries as $gallery)
    <div class="modal fade" id="updateGallery{{ $gallery->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
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
                        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST"
                              enctype="multipart/form-data"
                              class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <img src="{{ asset('storage/' . $gallery->image) }}"
                                     class="rounded mx-auto d-block img-fluid"
                                     alt="" width="300">
                            </div>

                            <div class="col-12">
                                <label for="image" class="form-label">Capa</label>
                                <input type="file" name="image"
                                       class="form-control @error('image') is-invalid @enderror"
                                       value="{{ old('image', $gallery->id) }}"
                                       placeholder="Capa do projeto">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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
