@extends('layout.main')
@section('container')
    <div class="container position-relative">
        @if (session('update-success'))
            <div class="alert alert-success" role="alert">
                {{ session('update-success') }}
            </div>
        @endif
        @if (session('post-success'))
            <div class="alert alert-info" role="alert">
                {{ session('post-success') }}
            </div>
        @endif
        @if (session('delete-success'))
            <div class="alert alert-info" role="alert">
                {{ session('delete-success') }}
            </div>
        @endif
        <div class="row align-items-center bg-body-secondary p-2">
            <div class="col-md-4 border-end border-secondary">
                <!-- Informasi profil -->
                <div class="overflow-hidden d-flex align-items-center justify-content-center"
                    style="max-width: 200px; max-height: 200px;">
                    @if (auth()->user()->image != '/img/user-icon.jpg')
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="" width="100%"
                            class="rounded">
                    @else
                        <img src="{{ auth()->user()->image }}" alt="" width="100%" class="rounded">
                    @endif

                </div>
            </div>
            <div class="col-md-8 ps-5">
                <div class="d-flex align-items-center gap-3">
                    <h4>{{ auth()->user()->name }}</h4>
                    <a href="/edit-profile" class="btn btn-info fs-5 text-light">Edit Bio</a>

                </div>
                <p>{{ auth()->user()->username }}</p>
                <div class="d-flex gap-4">
                    <p class="fw-semibold">All Photos : {{ $galleriesCount }}</p>
                    <p class="fw-semibold">All Photos Public : {{ $galleriesPublic }}</p>
                    <p class="fw-semibold">All Photos Private : {{ $galleriesCount - $galleriesPublic }}</p>
                </div>
                <p><i>{{ auth()->user()->bio }}</i>
                </p>
            </div>
        </div>
        <hr>

        <div class="d-flex gap-3 flex-wrap">
            @foreach ($galleries as $item)
                <a data-bs-toggle="modal" data-bs-target="#detailModal{{ $loop->iteration }}">
                    <div class="gallery-item overflow-hidden rounded shadow-sm {{ $item->status == 1 ? 'border-success' : 'border-danger' }} border border-2"
                        style="width: 180px; height: 180px;">
                        <img src="{{ asset('storage/' . $item->image) }}" alt=""
                            class="object-fit-cover w-100 h-100">
                    </div>
                </a>

                <!-- Modal detail -->
                <div class="modal fade" id="detailModal{{ $loop->iteration }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Post</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="profile/post/update" method="post">
                                @csrf
                                <div class="modal-body">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Gallery Image"
                                        class="img-fluid mb-3">
                                    <p><strong>Caption:</strong> {{ $item->caption }}</p>
                                    <p><strong>Upload:</strong> {{ $item->created_at->diffForHumans() }}</p>
                                    <label for="status">status private</label>
                                    <select name="status" id="status">
                                        <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>public</option>
                                        <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>private</option>
                                    </select>
                                    <input type="hidden" name="status_old" value="{{ $item->status }}">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <div>
                                        <button type="submit" class="btn btn-info text-light">Update</button>
                                        <a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $loop->iteration }}"
                                            class="btn
                                            btn-danger">Delete</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal logout -->
                <div class="modal fade" id="deleteModal{{ $loop->iteration }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure want to delete this post?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="profile/post/destroy/{{ $item->slug }}" class="btn btn-primary">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <br><br><br>
        <a href="/profile/post/create" class="btn btn-info w-100 position-absolute bottom-0 text-light">Add Post +</a>

    </div>
@endsection
