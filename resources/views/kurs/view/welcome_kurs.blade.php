@extends('layouts.app')

@section('title-block') Курсовая @endsection

@section('content')

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:200,600" rel="stylesheet">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 300;
            height: 20vh;
            margin: 0;
        }

        .full-height {
            height: 25vh;
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
            font-size: 60px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .link > a {
            font-family: 'Merriweather', sans-serif;
            color: #5b6b6f;
            padding: 0 25px;
            font-size: 25px;
            font-weight: 400;
            letter-spacing: .1rem;
            text-decoration: none;
        }
        
        .h-1 {
            color: #286f6b;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Информационная система автопредприятия города.
            </div>
        </div>
    </div>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="link content">
                    <h1 class="h-1">Запросы</h1>
                    <a href="{{ route('query_1') }}">Запрос №1</a>
                    <br>
                    <a href="{{ route('query_2') }}">Запрос №2-3</a>
                    <br>
                    <a href="{{ route('query_4') }}">Запрос №4</a>
                    <br>
                    <a href="{{ route('query_5') }}">Запрос №5</a>
                    <br>
                    <a href="{{ route('query_6') }}">Запрос №6</a>
                    <br>
                    <a href="{{ route('query_7') }}">Запрос №7</a>
                    <br>
                    <a href="{{ route('query_8') }}">Запрос №8-9</a>
                    <br>
                    <a href="{{ route('query_10') }}">Запрос №10</a>
                    <br>
                    <a href="{{ route('query_11') }}">Запрос №11</a>
                    <br>
                    <a href="{{ route('query_12') }}">Запрос №12</a>
                    <br>
                    <a href="{{ route('query_13') }}">Запрос №13</a>
                    <br>
                    <a href="{{ route('query_14') }}">Запрос №14</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="link content">
                    <h1 class="h-1">Таблицы</h1>
                    <a href="{{ route('table_type_transports') }}">Таблица "Категории"</a>
                    <br>
                    <a href="{{ route('table_plots') }}">Таблица "Участки"</a>
                    <br>
                    <a href="{{ route('table_masters') }}">Таблица "Мастера"</a>
                    <br>
                    <a href="{{ route('table_foremans') }}">Таблица "Бригадиры"</a>
                    <br>
                    <a href="{{ route('table_workers') }}">Таблица "Работники"</a>
                    <br>
                    <a href="{{ route('table_service_workshops') }}">Таблица "Цехи обслуживания"</a>
                    <br>
                    <a href="{{ route('table_garages') }}">Таблица "Гаражи"</a>
                    <br>
                    <a href="{{ route('table_brands') }}">Таблица "Бренды"</a>
                    <br>
                    <a href="{{ route('table_models') }}">Таблица "Модели"</a>
                    <br>
                    <a href="{{ route('table_car_park') }}">Таблица "Автопарк"</a>
                    <br>
                    <a href="{{ route('table_drivers') }}">Таблица "Водители"</a>
                    <br>
                    <a href="{{ route('table_mileages') }}">Таблица "Пробег"</a>
                    <br>
                    <a href="{{ route('table_routes') }}">Таблица "Маршруты"</a>
                    <br>
                    <a href="{{ route('table_transportations') }}">Таблица "Перевозки"</a>
                    <br>
                    <a href="{{ route('table_repairs') }}">Таблица "Ремонты"</a>
                    <br>
                    <a href="{{ route('table_write_offs') }}">Таблица "Списанная техника"</a>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

@endsection
