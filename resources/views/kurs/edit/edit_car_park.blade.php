@extends('layouts.app')

@section('title-block') Изменить данные о авто с номером - {{$car_park->id}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_car_park') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить данные о авто с номером - {{$car_park->id}}</h1>

        {!! Form::open(['route' => ['update_car_park', $car_park->id],'method' => 'PUT']) !!}

        <div class="form-group">
            <lable for="id_model">Заново выберете модель:</lable>
            <select name="id_model"
                    id="id_model"
                    class="form-control"
                    style="">
                @foreach($models as $model)
                    <option value="{{ $model->id }}">
                        {{ $model->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <lable for="id_type">Заново выберете категорию:</lable>
            <select name="id_type"
                    id="id_type"
                    class="form-control"
                    style="">
                @foreach($types as $type)
                    <option value="{{ $type->id }}">
                        {{ $type->type }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <lable for="id_garage">Заново выберете гараж:</lable>
            <select name="id_garage"
                    id="id_garage"
                    class="form-control"
                    style="">
                @foreach($garages as $garage)
                    <option value="{{ $garage->id }}">
                        {{ $garage->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <lable for="id_service">Заново выберете цех обслуживания:</lable>
            <select name="id_service"
                    id="id_service"
                    class="form-control"
                    style="">
                @foreach($services as $service)
                    <option value="{{ $service->id }}">
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection
