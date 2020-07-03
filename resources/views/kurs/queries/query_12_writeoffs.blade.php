@extends('layouts.app')

@section('title-block') Таблицы "Зачисление и списание" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Списание"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Модель</th>
                <th scope="col">Дата списания</th>
            </tr>
            </thead>
            <tbody>
            @foreach($writeoffs as $writeoff)
                <tr>
                    <th scope="row">{{ $writeoff->models->name }}</th>
                    <td>{{ $writeoff->date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <br>
        <br>

        <h1>Таблица "Зачисление"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Модель</th>
                <th scope="col">Дата поступления</th>
            </tr>
            </thead>
            <tbody>
            @foreach($receipts as $receipt)
                <tr>
                    <th scope="row">{{ $receipt->models->name }}</th>
                    <td>{{ $receipt->date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h1> По промежутку </h1>

        {!! Form::open(array('route' => 'query_12_date')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-2"></div>
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
            <div class="col-md-2"></div>
        </div>

        {!! Form::submit('Отобрать',['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}

        <br>
        <br>

    </div>
@endsection

