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
                    @if ($user->image != '/img/user-icon.jpg')
                        <img src="{{ asset('storage/' . $user->image) }}" alt="" width="100%" class="rounded">
                    @else
                        <img src="{{ $user->image }}" alt="" width="100%" class="rounded">
                    @endif

                </div>
            </div>
            <div class="col-md-8 ps-5">
                <div class="d-flex align-items-center gap-3">
                    <h4>{{ $user->name }}</h4>
                    <a href="/edit-profile" class="btn btn-info fs-5 text-light">Edit Bio</a>

                </div>
                <p>{{ $user->username }}</p>
                <div class="d-flex gap-4">
                    <p class="fw-semibold">All Photos : {{ $galleriesCount }}</p>
                    <p class="fw-semibold">All Photos Public : {{ $galleriesPublic }}</p>
                    <p class="fw-semibold">All Photos Private : {{ $galleriesCount - $galleriesPublic }}</p>
                </div>
                <p><i>{{ $user->bio }}</i>
                </p>
            </div>
        </div>
        <hr>

        <div class="d-flex gap-3 flex-wrap">
            @if (count($galleries) > 0)
                @foreach ($galleries as $item)
                    <a data-bs-toggle="modal" data-bs-target="#detailModalUser{{ $loop->iteration }}">
                        <div class="gallery-item overflow-hidden rounded shadow-sm {{ $item->status == 1 ? 'border-success' : 'border-danger' }} border border-2"
                            style="width: 180px; height: 180px;">
                            <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                class="object-fit-cover w-100 h-100">
                        </div>
                    </a>

                    <!-- Modal detail -->
                    <div class="modal fade" id="detailModalUser{{ $loop->iteration }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Post</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Gallery Image"
                                        class="img-fluid mb-3">
                                    <p><strong>Caption:</strong> {{ $item->caption }}</p>
                                    <p><strong>Upload:</strong> {{ $item->created_at->diffForHumans() }}</p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
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
            @else
                <h3 class="mt-5 mx-auto">The user hasn't posted anything yet</h3>
            @endif

        </div>
        <br><br><br>
    </div>
@endsection
