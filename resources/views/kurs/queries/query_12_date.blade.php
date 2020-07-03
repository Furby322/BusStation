@extends('layouts.app')

@section('title-block') Таблица "Ремонт по категории" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('query_12') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h2>В промежутке: {{ $date1 }} - {{ $date2 }}</h2>
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
                @if(isset($writeoff->models))
                <tr>
                    <th scope="row">{{ $writeoff->models->name }}</th>
                    <td>{{ $writeoff->date }}</td>
                </tr>
                @endif
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
                @if(isset($writeoff->models))
                <tr>
                    <th scope="row">{{ $receipt->models->name }}</th>
                    <td>{{ $receipt->date }}</td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>

        <br>
        <br>


    </div>
@endsection
