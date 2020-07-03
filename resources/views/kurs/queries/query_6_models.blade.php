@extends('layouts.app')

@section('title-block') Таблица "Автомобиль" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('query_6') }}">
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
                <th scope="col">Модель</th>
                <th scope="col">Выполнил работу</th>
                <th scope="col">Деталь</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Дата ремонта</th>
            </tr>
            </thead>
            <tbody>
            @foreach($repairs as $repair)
                @if(isset($repair->car_park))
                    <tr>
                        <th scope="row">{{ $repair->car_park->models->name }}</th>
                        <td>{{ $repair->workers->name }}</td>
                        <td>{{ $repair->detail }}</td>
                        <td>{{ $repair->price }}</td>
                        <td>{{ $repair->date }}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>


    </div>
@endsection
