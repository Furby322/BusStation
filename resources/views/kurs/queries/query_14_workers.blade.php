@extends('layouts.app')

@section('title-block') Таблица "Ремони" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('query_14') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>По исполнителю работ: {{ $type_w->name }}</h1>

        <br>

        <h1>Таблица "Ремонты"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Модель</th>
                <th scope="col">Работа</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Дата ремонта</th>
            </tr>
            </thead>
            <tbody>
            @foreach($repairs as $repair)
                @if(isset($repair->workers))
                    <tr>
                        <td>{{ $repair->car_park->models->name }}</td>
                        <td>{{ $repair->detail }}</td>
                        <td>{{ $repair->price }}</td>
                        <td>{{ $repair->date }}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>

        <br>
        <br>


    </div>
@endsection
