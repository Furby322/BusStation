@extends('layouts.app')

@section('title-block') Изменить данные о маршруте №{{$routes->number_rout}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_routes') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить данные о маршруте №{{$routes->number_rout}}</h1>

        {!! Form::open(['route' => ['update_route', $routes->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('number_rout', 'Маршрут:') !!}
            {!! Form::text('number_rout',$routes->number_rout,['id' => 'number_rout', 'class' => 'form-control']) !!}
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
