@extends('layouts.app')

@section('title-block') Таблица "Ремонт по категории" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('query_11') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Ремонт по категории: {{ $type_t->type }}"</h1>
        <h2>В промежутке: {{ $date1 }} - {{ $date2 }}</h2>
        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Бренд</th>
                <th scope="col">Модель</th>
                <th scope="col">Деталь</th>
                <th scope="col">Дата ремонта</th>
            </tr>
            </thead>
            <tbody>
            @foreach($types as $type)
                @if(isset($type->car_park))
                    <tr>
                        <td>{{ $type->car_park->models->brands->name }}</td>
                        <td>{{ $type->car_park->models->name }}</td>
                        <td>{{ $type->detail }}</td>
                        <td>{{ $type->date }}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>


    </div>
@endsection