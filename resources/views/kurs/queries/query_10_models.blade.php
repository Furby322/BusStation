@extends('layouts.app')

@section('title-block') Таблица "Автомобиль" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('query_10') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Доставка по автомобилю: {{ $type_t->models->name }}"</h1>
        <h2>В промежутке: {{ $date1 }} - {{ $date2 }}</h2>
        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Модель</th>
                <th scope="col">Груз</th>
                <th scope="col">Дата</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trans as $tran)
                @if(isset($tran->car_park))
                <tr>
                    <td>{{ $tran->car_park->models->name }}</td>
                    <td>{{ $tran->type }}</td>
                    <th>{{ $tran->date }}</th>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>


    </div>
@endsection

