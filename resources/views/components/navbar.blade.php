<nav class="navbar navbar-expand-lg fixed-top  border-none py-2 px-3 bg-white title-font tx-1 shadow-sm">
    <div class="container-fluid justify-content-between align-items-center  ">

        {{-- logo --}}
        <a class="navbar-brand text-dark margin-logo" href="{{ route('home') }}"><img class="logo margin-logo"
                src="/THE_POST_SCRIPTUM-Photoroom.png-Photoroom.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07"
            aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        {{-- <div> --}}
            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mx-auto justify-content-evenly  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('index') }}">Tutti gli Articoli</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Categorie</a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('categories', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    @auth

                        {{-- <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf <!-- Token CSRF -->

                                <!-- Pulsante di logout -->
                                <div>
                                    <button class="nav-link active text-dark" type="submit">Logout</button>
                                </div>
                            </form>
                        </li> --}}
                        @if (Auth::user()->is_writer)
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle text-dark" href="#"
                                    data-bs-toggle="dropdown" aria-expanded="false">Articoli</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('create') }}">Crea Articolo</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">Categorie</a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item"
                                            href="{{ route('categories', $category->id) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="{{ route('careers') }}">Lavora con noi</a>
                        </li>
                        @if (Auth::user()->is_admin || Auth::user()->is_revisor || Auth::user()->is_writer)
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle text-dark" href="#"
                                    data-bs-toggle="dropdown" aria-expanded="false">Dashboard</a>
                                <ul class="dropdown-menu">
                                    @if (Auth::user()->is_admin)
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{ route('admin.dashboard') }} ">Dashboard
                                                Ammistratore</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->is_revisor)
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{ route('revisor.dashboard') }} ">Dashboard
                                             Revisore</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->is_writer)
                                        <li  class="nav-item">
                                            <a class="nav-link active"  href=" {{ route('writer.dashboard') }} ">Dasboard Redattore
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                    @endauth
                    <form action="{{ route('article.search') }}" method="GET" class="d-flex" role="search">
                        <input class="form-control py-0 me-1 b-0" type="search" name="query"
                            placeholder="Cerca tra gli articoli.." aria-label="Search">
                        <button class="btn p-0 m-1 b-0" type="submit"><i class="bi bi-search"></i>
                        </button>
                    </form>

                </ul>
                <div class="dropdown  d-flex justify-content-start justify-content-md-center">
                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi fs-2 bi-person-circle heading tx-1"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-md-end dropdown-menu-start  ">
                        @guest
                        <li class="nav-item">
                                <div class="d-flex justify-content-center ">
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#Registrati">
                                        Registrati
                                    </button>
                                </div>
                                {{-- <a class="nav-link active text-dark px-2 my-1" href="{{ route('register') }}">Registrati</a> --}}
                            </li>
                            <li class="nav-item">
                                <div class="d-flex justify-content-center ">
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#Accedi">
                                        Accedi
                                    </button>
                                </div>
                                {{-- <a class="nav-link active text-dark px-2 my-1" href="{{ route('login') }}">Login</a> --}}
                            </li>
                        @endguest

                        @auth
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf <!-- Token CSRF -->

                                    <!-- Pulsante di logout -->
                                    <div class="d-flex justify-content-center">
                                        <button class="nav-link active text-dark btn-danger" type="submit">Esci</button>
                                    </div>
                                </form>
                            </li>
                        @endauth
                    </ul>

                </div>
            </div>
        {{-- </div> --}}



        {{-- <div>
            <i class="bi bi-facebook mx-2 text-dark"></i>
            <i class="bi bi-whatsapp mx-2 text-dark"></i>
            <i class="bi bi-twitter-x mx-2 text-dark"></i>
            <i class="bi bi-instagram mx-2 text-dark"></i>
        </div> --}}
    </div>
</nav>

<!-- Modale Registrazione -->
<div class="modal fade" id="Registrati" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header justify-content-center ">
                <h1 class="modal-title title-font tx-1 fs-5" id="exampleModalLabel">Registrati</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf <!-- Token CSRF -->


                    <div class="mb-3 title-font ">
                        <label for="name">Nome *</label>
                        <input class="form-control " id="name" type="text" name="name"
                            value="{{ old('name') }}" required autofocus>
                    </div>
                    <div class="mb-3 title-font ">
                        <label for="email">Email *</label>
                        <input class="form-control " id="email" type="email" name="email"
                            value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3 title-font ">
                        <label for="password">Password * </label>
                        <input class="form-control " id="password" type="password" name="password" required
                            autocomplete="new-password">
                    </div>
                    <div class="mb-3 title-font">
                        <label for="password_confirmation">Conferma Password *</label>
                        <input class="form-control " id="password_confirmation" type="password"
                            name="password_confirmation" required>
                    </div>
                    <span class="title-font tx-2"> *: Campi obbligatori </span>
                    <div class="row">

                    </div>

                    <p class="mt-2 title-font">Sei già registrato?<a class="lnk" href="{{ route('login') }}">
                            Clicca
                            qui!</a>
                    </p>
                    <div class="modal-footer justify-content-center ">
                        <button class="btn bg-info text-white title-font">Registrati</button>
                    </div>


                </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal Accesso -->
<div class="modal fade " id="Accedi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h1 class="modal-title title-font tx-1 fs-5" id="exampleModalLabel">Accedi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body title-font">
                <form method="POST" action="{{ route('login') }}">
                    @csrf <!-- Token CSRF -->

                    <div class="mb-3 ">
                        <label for="email">Email</label>
                        <input class="form-control " id="email" type="email" name="email"
                            value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3 ">
                        <label for="password">Password</label>
                        <input class="form-control " id="password" type="password" name="password" required
                            autocomplete="new-password">
                    </div>
                    <div>
                        <p class="mt-2">Non sei già registrato?<a class="lnk txt-2"
                                href="{{ route('register') }}"> Clicca qui!</a></p>

                    </div>

                    <div class="modal-footer justify-content-center ">
                        <button class="btn bg-info text-white">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
