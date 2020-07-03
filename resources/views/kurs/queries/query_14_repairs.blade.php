@extends('layouts.app')

@section('title-block') Таблица "Ремонты" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Ремонты"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Модель</th>
                <th scope="col">Выполнил работу</th>
                <th scope="col">Работа</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Дата ремонта</th>
            </tr>
            </thead>
            <tbody>
            @foreach($repairs as $repair)
                @php /** @var \App\Models\Masters $master */  @endphp
                <tr>
                    <th scope="row">{{ $repair->car_park->models->name }}</th>
                    {{--                    <td>{{ $car->type_transports->type  }}</td>--}}
                    <td>{{ $repair->workers->name }}</td>
                    <td>{{ $repair->detail }}</td>
                    <td>{{ $repair->price }}</td>
                    <td>{{ $repair->date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h1> По исполнителю работы </h1>

        {!! Form::open(array('route' => 'query_14_workers')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-4">
                <div class="form-group">
                    <lable for="worker">ФИО</lable>
                    <select name="worker"
                            id="worker"
                            class="form-control"
                            style="margin-top: 8px">
                        <div style="height: 100px; overflow: scroll">
                        @foreach($workers as $worker)
                            <option  value="{{ $worker->id }}">
                                {{ $worker->name }}
                            </option>
                        @endforeach
                        </div>
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

        <h1> По категории </h1>

        {!! Form::open(array('route' => 'query_14_cars')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-3">
                <div class="form-group">
                    <lable for="worker">ФИО</lable>
                    <select name="worker"
                            id="worker"
                            class="form-control"
                            style="margin-top: 8px">
                        @foreach($workers as $worker)
                            <option value="{{ $worker->id }}">
                                {{ $worker->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <lable for="car">Конкретное авто:</lable>
                    <select name="car"
                            id="car"
                            class="form-control"
                            style="margin-top: 8px">
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}">
                                {{ $car->models->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('date1', 'Начало промежутка:') !!}
                    {!! Form::date('date1',null,['placeholder' => 'дд-мм-гггг', 'id' => 'date1', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-3">
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