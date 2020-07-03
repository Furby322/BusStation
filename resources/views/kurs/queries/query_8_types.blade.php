@extends('layouts.app')

@section('title-block') Таблица "Автопарк по типу" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('query_8') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Автопарк по категории: {{ $type_t->type }}"</h1>
        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Модель авто</th>
                <th scope="col">Гараж</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                @if(isset($car->types))
                <tr>
                    <td>{{ $car->models->name }}</td>
                    <th scope="row">{{ $car->garages->name }}</th>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>


    </div>
@endsection
