<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('welcome') }}">Главная страница <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Лабораторные работы</a>
                <div class="dropdown-menu" aria-labelledby="dropdown08">
                    <a class="dropdown-item" href="{{ route('contact') }}">Лаб. Раб. №1</a>
                    <a class="dropdown-item" href="{{ route('lab2_view') }}">Лаб. Раб. №2</a>
                    <a class="dropdown-item" href="{{ route('lab3_index_view') }}">Лаб. Раб. №3</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('welcome_kurs') }}">Курсовая<span class="sr-only">(current)</span></a>
            </li>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Главная</a>
                        @if(Auth::user()->active === 1)
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-expanded="false">Privet {{ Auth::user()->username }}</a>
                        @elseif(Auth::user()->active === 2)
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-expanded="false">Privet {{ Auth::user()->username }} <i class="fa fa-unlock-alt"></i></a>
                        @endif
                        @if (Route::has('logout'))
                            <ul class="dropdown-menu links top-right" role="menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" style="text-decoration: none"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @endif

                    @else
                        <a href="{{ route('login') }}" style="text-decoration: none;">Войти</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="text-decoration: none;">Регистрация</a>
                        @endif
                    @endauth
                </div>
            @endif
        </ul>
    </div>
</nav>
