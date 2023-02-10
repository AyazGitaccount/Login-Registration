<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/blog_post">Post Blog</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/blog">Blog</a></li>
                        {{-- <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                    </ul>
                </li>

            </ul>
            @if(Auth::check())
            <div class="user-info mx-3">
                <img class="rounded-circle w-25 h-20" src="{{ asset('storage/images/' . Auth::user()->image) }}" alt="User Image">
                <span>{{ Auth::user()->name }}</span>
            </div>
            <form class="d-flex" method="POST" action="/logout">
                @csrf
                <button class="btn btn-primary" type="submit">Logout</button>
            </form>
            @else
            <a class="btn btn-primary" href="/login" role="button">Login</a>
            @endif
        </div>
    </div>
</nav>