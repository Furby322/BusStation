@extends('layouts.app')

@section('title-block') Таблица "Пробег" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">

        <h1>Таблица "Пробег"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Автотранспорт</th>
                <th scope="col">Пробег в км.</th>
                <th scope="col">Дата</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mileages as $mileage)
                @php /** @var \App\Models\Masters $master */  @endphp
                <tr>
                    <th scope="row">{{ $mileage->car_park->models->name }}</th>
                    <td>{{ $mileage->mileage }}</td>
                    <td>{{ $mileage->date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div {{--class="col-md-4"--}}>
            <div>
                {{ $mileages->links() }}
            </div>
        </div>

        <h1> По категории </h1>

        {!! Form::open(array('route' => 'query_5_types')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-4">
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

        <h1> По конкретному авто </h1>
        {!! Form::open(array('route' => 'query_5_models')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-4">
                <div class="form-group">
                    <lable for="model">Конкретное авто</lable>
                    <select name="model"
                            id="model"
                            class="form-control"
                            placeholder="Автомобиль" style="margin-top: 8px">
                        @foreach($car_park as $car)
                            <option value="{{ $car->id }}">
                                {{ $car->models->name }}
                            </option>
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
