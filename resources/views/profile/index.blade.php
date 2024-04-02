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
                <a href="/profile/post/{{ $item->id }}">
                    <div class="gallery-item overflow-hidden rounded shadow-sm {{ $item->status == 1 ? 'border-success' : 'border-danger' }} border border-2"
                        style="width: 180px; height: 180px;">
                        <img src="{{ asset('storage/' . $item->image) }}" alt=""
                            class="object-fit-cover w-100 h-100">
                    </div>
                </a>
            @endforeach

        </div>
        <br><br><br>
        <a href="/profile/post/create" class="btn btn-info w-100 position-absolute bottom-0 text-light">Add Post +</a>

    </div>
@endsection
