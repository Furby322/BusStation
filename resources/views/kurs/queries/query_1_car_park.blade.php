@extends('layouts.app')

@section('title-block') Таблица "Автопарк" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Автопарк"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Модель</th>
                <th scope="col">Тип транспорта</th>
                <th scope="col">Гараж</th>
                <th scope="col">Цех</th>
                <th scope="col">Дата получения</th>
            </tr>
            </thead>
            <tbody>
            @foreach($car_park as $car)
                @php /** @var \App\Models\Masters $master */  @endphp
                <tr>
                    <th scope="row">{{ $car->models->name }}</th>
                    {{--                    <td>{{ $car->type_transports->type  }}</td>--}}
                    <td>{{ $car->types->type }}</td>
                    <td>{{ $car->garages->name }}</td>
                    <td>{{ $car->services->name }}</td>
                    <td>{{ $car->date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div {{--class="col-md-4"--}}>
            <div>
                {{ $car_park->links() }}
            </div>
        </div>


    </div>
@endsection