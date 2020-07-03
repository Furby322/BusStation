@extends('layouts.app')

@section('title-block') Изменить данные о ремонте под номером №{{$repairs->id}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_repairs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить данные о ремонте под номером №{{$repairs->id}}</h1>

        {!! Form::open(['route' => ['update_repair', $repairs->id],'method' => 'PUT']) !!}

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

        <div class="form-group">
            <lable for="id_worker">Заново выберете рабочего:</lable>
            <select name="id_worker"
                    id="id_worker"
                    class="form-control"
                    style="">
                @foreach($workers as $worker)
                    <option value="{{ $worker->id }}">
                        {{ $worker->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Стоимость:') !!}
            {!! Form::text('price',$repairs->price,['id' => 'price', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('detail', 'Деталь:') !!}
            {!! Form::text('detail',$repairs->detail,['id' => 'detail', 'class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection
