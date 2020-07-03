@extends('layouts.app')

@section('title-block') Таблица "Грузоперевозки" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Грузореревозки"</h1>
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
                <tr>
                    <td>{{ $tran->car_park->models->name }}</td>
                    <td>{{ $tran->type }}</td>
                    <th>{{ $tran->date }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h1> По автомобилю </h1>

        {!! Form::open(array('route' => 'query_10_models')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-4">
                <div class="form-group">
                    <lable for="model">Автомобиль:</lable>
                    <select name="model"
                            id="model"
                            class="form-control"
                            placeholder="Категория" style="margin-top: 8px">
                        @foreach($trans as $tran)
                            @if(isset($tran->car_park->models))
                            <option value="{{ $tran->car_park->id }}">
                                {{ $tran->car_park->models->name }}
                            </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('date1', 'Начало промежутка:') !!}
                    {!! Form::date('date1',null,['placeholder' => 'дд-мм-гггг', 'id' => 'date1', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('date2', 'Конец промежутка:') !!}
                    {!! Form::date('date2',null,['placeholder' => 'дд-мм-гггг', 'id' => 'date2', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        {!! Form::submit('Отобрать',['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}

        <br>
        <br>

    </div>
@endsection