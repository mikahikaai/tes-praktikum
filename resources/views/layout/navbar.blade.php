<nav class="main-header navbar navbar-expand-lg bg-light">
    @auth
        <button class="btn btn-primary mr-2" data-widget="pushmenu" id="button-toggle">
            <i class="fas fa-bars"></i>
        </button>
    @endauth
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            {{-- @dd(Auth::user()->role) --}}
            @if (Auth::check())
                <span class="fw-bold">>>> Selamat datang di Aplikasi Distro Baju Web-B, saat ini Anda login sebagai
                    <span class="text-danger">{{ ucfirst(Auth::user()->role) }}</span>
                    <<< </span>
            @endif
        </div>
    </div>
    @auth
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" href="#"
                    aria-expanded="false">
                    <i class="fas fa-gear"></i>
                    <!-- <p>Pengaturan</p> -->
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="dropdown-item" href="/logout">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

    @endauth
    @guest
        <a href="/login" class="btn btn-success float-end">Login</a>
    @endguest
</nav>
