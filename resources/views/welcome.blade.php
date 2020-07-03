<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Бесхлебный Михаил</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 15px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Главная</a>
                        @if(Auth::user()->active === 1)
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-expanded="false">Privet {{ Auth::user()->username }}!</a>
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

            <div class="content">
                <div class="title m-b-md">
                    Бесхлебный Михаил <i class="fa fa-graduation-cap" aria-hidden="true"></i> ВИС 31
                </div>

                <div class="links">
                    <a href="{{ route('contact') }}">Лабораторная №1</a>
                    <a href="{{ route('lab2_view') }}">Лабораторная №2</a>
                    <a href="{{ route('lab3_index_view') }}">Лабораторная №3</a>
                </div>
                <br>
                <div class="links">
                    <a href="{{ route('welcome_kurs') }}">Курсовая</a>
                </div>
            </div>
        </div>
    </body>
</html>
