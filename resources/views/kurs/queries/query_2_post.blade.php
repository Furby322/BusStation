@extends('layouts.app')

@section('title-block') Таблица "Водители" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('query_2') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Водители по автомобилю: {{ $cars->models->name }}"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Водитель</th>
                <th scope="col">Машина</th>
            </tr>
            </thead>
            <tbody>
            @foreach($drivers_q as $driver)
                @if(isset($driver->car_park))
                <tr>
                    <th scope="row">{{ $driver->name }}</th>
                    <td>{{ $driver->car_park->models->name }}</td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>

        <br>
        <br>
    </div>
@endsection
