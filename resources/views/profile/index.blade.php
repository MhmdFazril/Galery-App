@extends('layout.main')
@section('container')
    <div class="container position-relative">
        @if (session('update-success'))
            <div class="alert alert-success" role="alert">
                {{ session('update-success') }}
            </div>
        @endif
        <div class="row align-items-center bg-body-secondary p-2">
            <div class="col-md-4 border-end border-secondary">
                <!-- Informasi profil -->
                <img src="/img/user.jpg" alt="" width="80%">
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
                <p><i>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus tempora doloremque harum</i>
                </p>
            </div>
        </div>
        <hr>

        <div class="d-flex gap-3 flex-wrap">
            @foreach ($galleries as $item)
                <div class="gallery-item overflow-hidden rounded shadow-sm" style="width: 180px; height: 180px;">
                    <img src="{{ $item->image }}" alt="Gambar 2" class="object-fit-cover w-100 h-100">
                </div>
            @endforeach

        </div>
        <br><br><br>
        <a href="" class="btn btn-info w-100 position-absolute bottom-0">Add Post +</a>

    </div>
@endsection
