@extends('layouts.app')

@section('title-block') Таблица "Маршруты" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Маршруты"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">№ Маршрута</th>
                <th scope="col">Автотранспорт</th>
            </tr>
            </thead>
            <tbody>
            @foreach($routes as $route)
                @php /** @var \App\Models\Masters $master */  @endphp
                <tr>
                    <th scope="row">{{ $route->number_rout }}</th>
                    <td>{{ $route->car_park->models->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div {{--class="col-md-4"--}}>
            <div>
                {{ $routes->links() }}
            </div>
        </div>


    </div>
@endsection
