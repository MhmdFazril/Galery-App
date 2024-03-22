@extends('layout.main')
@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Update Profile</h5>
                        <form action="/update-profile" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Input your best name" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input name="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" id="username"
                                    placeholder="Input your best username" value="{{ old('username', $user->username) }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" id="description" rows="3"
                                    placeholder="Input your best bio">{{ old('bio', $user->bio) }}</textarea>
                                @error('bio')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Profile image</label>
                                <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}">
                                <div class="overflow-hidden" style="width: 180px; height: 180px;">
                                    @if (auth()->user()->image != '/img/user-icon.jpg')
                                        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt=""
                                            class="w-100 img-preview img-fluid mb-2 col-sm-5 d-block rounded border shadow-sm"
                                            id="img-preview">
                                    @else
                                        <img src="{{ auth()->user()->image }}" alt=""
                                            class="w-100 img-preview img-fluid mb-2 col-sm-5 d-block rounded border shadow-sm"
                                            id="img-preview">
                                    @endif

                                </div>
                                <input
                                    class="form-control
                                    @error('image') is-invalid @enderror"
                                    type="file" id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
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

            // ========== MENGGUNAKAN CHATGPT TAPI BERHASIL ============
            oFReader.onload = function(e) {
                imgPreview.src = e.target.result;
            }

            oFReader.readAsDataURL(image.files[0]);
        }
    </script>
@endsection
