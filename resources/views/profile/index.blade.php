@extends('layout.main')
@section('container')
    <div class="container p-3 bg-info">
        <div class="row justify-content-between">
            <div class="col bg-success">
                <div class="rounded-circle overflow-hidden" style="width: 200px; height: 200px;">
                    <img src="/img/user.jpg" alt="" class="w-100 h-100 object-fit-cover">
                </div>
            </div>
            <div class="col bg-danger">
                <div class="d-flex">
                    <h4>asep saipul</h4>
                    <span>edit bio</span>
                </div>
                <div class="col">
                    <p>username</p>
                    <p>bio</p>
                </div>
            </div>
        </div>
    </div>
@endsection
