<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary position-fixed top-0 bottom-0" style="width: 280px">
    <div class="mb-auto" style="margin-top: 80px">
        <div class="" style="max-height: 430px; overflow: auto">
            @foreach ($users as $user)
                <a
                    href="#"class="width-100 bg-info bg-opacity-50 rounded-pill d-flex align-items-center gap-3 overflow-hidden mt-3 text-decoration-none card-avatar">
                    <img class="rounded-circle" src="https://github.com/mdo.png" alt="" width="55"
                        height="55">
                    <div class="">
                        <h6 class="text-light mb-0">{{ $user->name }}</h6>
                        <p class="mb-0 fs-6 text-light fst-italic">{{ $user->username }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>


    <hr />
    <div class="dropdown ">
        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2" />
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">New Post ...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>
