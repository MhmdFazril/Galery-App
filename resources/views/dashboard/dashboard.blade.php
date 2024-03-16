@extends('layout.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                @foreach ($galleries as $gallery)
                    <div class="card-avatar">
                        <div class="d-flex gap-2 w-100 align-items-center mb-2 ">
                            <img src="/img/user.jpg" alt="" class="object-fit-cover rounded-circle" width="35px"
                                height="35px">
                            <p class="mb-0 fw-semibold">{{ $gallery->user->name }}</p>
                            <p class="text-secondary fs-6  mb-0 ms-auto">{{ $gallery->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="card mb-3">
                            <img src="{{ $gallery->image }}" class="card-img-top" alt="{{ $gallery->caption }}">
                            <div class="card-body px-3 py-2">
                                <p class="card-text line-clamp-2 mb-1 text-dark" id="caption">
                                    {{ $gallery->caption }}
                                </p>
                                @if (Str::length($gallery->caption) > 131)
                                    <a href="#" class="mb-0 text-decoration-none text-dark fw-semibold"
                                        id="more">Click for more</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr class="mt-4 mb-3">
                @endforeach
            </div>
        </div>
    </div>

    <script>
        const more = document.querySelectorAll("#more")

        more.forEach(element => {
            element.addEventListener('click', function(e) {
                // const link = e.target;
                // const newText = link.textContent.trim() === "Click for more" ? "Click to collapse" :
                //     "Click for more";
                // link.textContent = newText;

                if (e.target.textContent.trim() === "Click for more") {
                    e.target.textContent = "Click to collapse"
                } else {
                    e.target.textContent = "Click for more"

                }

                // console.log(e.target.textContent.trim());


                e.target.previousElementSibling.classList.toggle('line-clamp-2');
                e.preventDefault();
            })
        });
    </script>
@endsection
