@extends('layouts.app')

@section('title-block') Таблица "Ремонт по конкретному авто" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('query_11') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Ремонт по автомобилю: {{ $type_t->models->name }}"</h1>
        <h2>В промежутке: {{ $date1 }} - {{ $date2 }}</h2>
        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Категория</th>
                <th scope="col">Бренд</th>
                <th scope="col">Модель</th>
                <th scope="col">Деталь</th>
                <th scope="col">Дата ремонта</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                @if(isset($car->car_park))
                    <tr>
                        <td>{{ $car->car_park->types->type }}</td>
                        <td>{{ $car->car_park->models->brands->name }}</td>
                        <td>{{ $car->car_park->models->name }}</td>
                        <td>{{ $car->detail }}</td>
                        <td>{{ $car->date }}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>


    </div>
@endsection
