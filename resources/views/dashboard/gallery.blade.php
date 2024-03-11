@extends('layout.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img src="/{{ $gallery->image }}" alt="" style="width: 100%">
                <p class="mt-3">{{ $gallery->caption }}</p>

                <p>{!! $gallery->description !!}</p>
            </div>
        </div>
    </div>
@endsection
