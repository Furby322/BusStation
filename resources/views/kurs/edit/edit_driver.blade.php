@extends('layouts.app')

@section('title-block') Изменить данные о водителе - {{$drivers->name}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_drivers') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить данные о водителе - {{$drivers->name}}</h1>

        {!! Form::open(['route' => ['update_driver', $drivers->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('name', 'ФИО водителя:') !!}
            {!! Form::text('name',$drivers->name,['id' => 'name', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <lable for="id_car">Заново выберете авто:</lable>
            <select name="id_car"
                    id="id_car"
                    class="form-control"
                    style="">
                @foreach($car_parks as $car_park)
                    <option value="{{ $car_park->id }}">
                        {{ $car_park->models->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection
