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
                <th scope="col">Деталь</th>
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

        <div {{--class="col-md-4"--}}>
            <div>
                {{ $repairs->links() }}
            </div>
        </div>

        <h1> По бренду </h1>

        {!! Form::open(array('route' => 'query_6_brands')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-4">
                <div class="form-group">
                    <lable for="brand">Бренд авто:</lable>
                    <select name="brand"
                            id="brand"
                            class="form-control"
                            style="margin-top: 8px">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">
                                {{ $brand->name }}
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

        <h1> По категории </h1>

        {!! Form::open(array('route' => 'query_6_types')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-4">
                <div class="form-group">
                    <lable for="type">Категория авто:</lable>
                    <select name="type"
                            id="type"
                            class="form-control"
                            style="margin-top: 8px">
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

        <br>
        <br>

        <h1> По конкретному авто </h1>

        {!! Form::open(array('route' => 'query_6_models')) !!}

        <div class="row"> {{--class="col-md-6">--}}
            <div class="col-md-4">
                <div class="form-group">
                    <lable for="model">Конкретное авто:</lable>
                    <select name="model"
                            id="model"
                            class="form-control"
                            style="margin-top: 8px">
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