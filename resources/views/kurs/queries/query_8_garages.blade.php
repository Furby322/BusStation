@extends('layouts.app')

@section('title-block') Таблица "Гаражное хозяйство" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Гаражи"</h1>
        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Гараж</th>
            </tr>
            </thead>
            <tbody>
            @foreach($garages as $garage)
                <tr>
                    <th scope="row">{{ $garage->name }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h1>Таблица "Распределение авто по предприятию"</h1>
        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Модель</th>
                <th scope="col">Категория</th>
                <th scope="col">Гараж</th>
                <th scope="col">Цех обслуживания</th>
            </tr>
            </thead>
            <tbody>
            @foreach($car as $car)
                    <tr>
                        <td>{{ $car->models->name }}</td>
                        <td>{{ $car->types->type }}</td>
                        <th>{{ $car->garages->name }}</th>
                        <th>{{ $car->services->name }}</th>
                    </tr>
            @endforeach
            </tbody>
        </table>

        <h1> Распределение авто по категории </h1>

        {!! Form::open(array('route' => 'query_8_types')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="type">Категория авто</lable>
                    <select name="type"
                            id="type"
                            class="form-control"
                            placeholder="Категория" style="margin-top: 8px">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">
                                {{ $type->type }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>

        {!! Form::submit('Отобрать',['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}

        <br>
        <br>

    </div>
@endsection
