@extends('layout.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <h3 class="px-3">Create Post</h3>
                <div class="border border-2 border-primary-subtl p-3 rounded position-relative ">
                    <form action="/profile/post/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label">Post image</label>
                            <img class="img-preview img-fluid mb-2 col-sm-5" id="img-preview">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                                name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="caption" class="form-label">Caption</label>
                            <input name="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                                id="caption" name="caption" value="{{ old('caption') }}">
                            @error('caption')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">make it private?</label>
                            <input type="checkbox" name="status" id="status">
                        </div>
                        <button type="submit" class="btn btn-primary d-inline-block ">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.onload = function(e) {
                imgPreview.src = e.target.result;
            }

            oFReader.readAsDataURL(image.files[0]);
        }
    </script>
@endsection
