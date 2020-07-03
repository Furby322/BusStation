@extends('layouts.app')

@section('title-block') Изменить данные о перевозке - {{$transportations->type}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_transportations') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить данные о перевозке - {{$transportations->type}}</h1>

        {!! Form::open(['route' => ['update_transportation', $transportations->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('type', 'Тип перевозки:') !!}
            {!! Form::text('type',$transportations->type,['id' => 'type', 'class' => 'form-control']) !!}
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