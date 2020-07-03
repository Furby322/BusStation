@extends('layouts.app')

@section('title-block') Таблица "Ремонт по бренду" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('query_11') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Ремонт по бренду: {{ $type_t->name }}"</h1>
        <h2>В промежутке: {{ $date1 }} - {{ $date2 }}</h2>
        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Категория</th>
                <th scope="col">Модель</th>
                <th scope="col">Деталь</th>
                <th scope="col">Дата ремонта</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                @if(isset($brand->car_park->models))
                    <tr>
                        <td>{{ $brand->car_park->types->type }}</td>
                        <td>{{ $brand->car_park->models->name }}</td>
                        <td>{{ $brand->detail }}</td>
                        <td>{{ $brand->date }}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>


    </div>
@endsection
