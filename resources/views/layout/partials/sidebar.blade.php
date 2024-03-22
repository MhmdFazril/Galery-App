<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary position-fixed top-0 bottom-0" style="width: 280px">
    <div class="mb-auto" style="margin-top: 80px">
        <div class="" style="max-height: 430px; overflow: auto">
            @foreach ($users as $user)
                @if ($user->name !== auth()->user()->name)
                    <a
                        href="#"class="width-100 bg-info bg-opacity-50 rounded-pill d-flex align-items-center gap-3 overflow-hidden mt-3 text-decoration-none card-avatar">

                        @if ($user->image != '/img/user-icon.jpg')
                            <img src="{{ asset('storage/' . $user->image) }}" class="rounded-circle" alt=""
                                width="55" height="55">
                        @else
                            <img class="rounded-circle" src="{{ $user->image }}" alt="" width="55"
                                height="55">
                        @endif
                        <div class="">
                            <h6 class="text-light mb-0">{{ $user->name }}</h6>
                            <p class="mb-0 fs-6 text-light fst-italic">{{ $user->username }}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>


    <hr />
    <div class="dropdown ">
        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">

            @if (auth()->user()->image != '/img/user-icon.jpg')
                <img src="{{ asset('storage/' . auth()->user()->image) }}" class="rounded-circle me-2" alt=""
                    width="37" height="37">
            @else
                <img class="rounded-circle me-2" src="{{ $user->image }}" alt="" width="32" height="32">
            @endif

            <strong>{{ auth()->user()->username }}</strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="/add-photo">New Post ...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="profile">Profile</a></li>
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign
                    out</a></li>
        </ul>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="/logout" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>
