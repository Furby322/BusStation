@extends('layouts.app')

@section('title-block') Таблица "Подчиненные бригадира" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('query_13') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Подчиненные: {{ $foreman->name }}</h1>

        <br>

        <h1>Рабочие:</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">ФИО</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workers as $worker)
                @if(isset($worker->foremans))
                    <tr>
                        <th scope="row">{{ $worker->name }}</th>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>

        <br>
        <br>


    </div>
@endsection
