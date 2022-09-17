<nav class="navbar navbar-expand-lg navbar-light bg-white" role="navigation">

    <div class="container">


        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="{{ route('terminal.home') }}">ODIN</a>

        <div class="dropdown d-flex d-lg-none">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger btn-sm">
                    Выйти
                </button>
            </form>
        </div>

        <div class="collapse navbar-collapse mt-3 mt-md-0" id="navbar-collapse">
            <ul class="navbar-nav align-items-lg-center justify-content-end w-100">
                <li class="nav-item">
                    <a href="{{ route('terminal.home') }}" class="nav-link text-uppercase-bold-sm">
                        {{ auth()->guard('terminal')->user()->title }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Order History
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Account Settings
                    </a>
                </li>
                <li class="nav-item ms-lg-4 d-lg-flex d-sm-none justify-content-end">
                    <form action="{{ route('logout') }}" class="d-sm-none d-lg-block" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm">
                            Выйти
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
