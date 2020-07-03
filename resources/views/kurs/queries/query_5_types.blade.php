@extends('layouts.app')

@section('title-block') Таблица "Пробег" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('query_5') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Пробег по категории: {{ $type_t->type }}"</h1>
        <h2>В промежутке: {{ $date1 }} - {{ $date2 }}</h2>
        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Автотранспорт</th>
                <th scope="col">Пробег в км.</th>
                <th scope="col">Дата</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mileages as $mileage)
                @if(isset($mileage->car_park))
                <tr>
                    <th scope="row">{{ $mileage->car_park->models->name }}</th>
                    <td>{{ $mileage->mileage }}</td>
                    <td>{{ $mileage->date }}</td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>

{{--        <div class="col-md-4">--}}
{{--            <div>--}}
{{--                {{ $mileages->links() }}--}}
{{--            </div>--}}
{{--        </div>--}}


    </div>
@endsection
