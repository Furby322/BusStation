@extends('layouts.app')

@section('title-block') Подчиненные @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1> Подчиненные бригадира: </h1>

        {!! Form::open(array('route' => 'query_13_foremans')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="foreman">Бригадиры:</lable>
                    <select name="foreman"
                            id="foreman"
                            class="form-control"
                            style="margin-top: 8px">
                        @foreach($foremans as $foreman)
                            <option value="{{ $foreman->id }}">
                                {{ $foreman->name }}
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

        <h1> Подчиненные мастера: </h1>

        {!! Form::open(array('route' => 'query_13_masters')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="master">Мастера:</lable>
                    <select name="master"
                            id="master"
                            class="form-control"
                            style="margin-top: 8px">
                        @foreach($masters as $master)
                            <option value="{{ $master->id }}">
                                {{ $master->name }}
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

        <h1> Подчиненные начальника участка: </h1>

        {!! Form::open(array('route' => 'query_13_plots')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <lable for="plot">Начальники:</lable>
                    <select name="plot"
                            id="plot"
                            class="form-control"
                            style="margin-top: 8px">
                        @foreach($plots as $plot)
                            <option value="{{ $plot->id }}">
                                {{ $plot->name_manager }}
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

