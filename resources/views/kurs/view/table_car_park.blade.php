@extends('layouts.app')

@section('title-block') Таблица "Автопарк" @endsection

@section('content')
    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="text-center">

        <h1>Таблица "Автопарк"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Модель</th>
                <th scope="col">Тип</th>
                <th scope="col">Гараж</th>
                <th scope="col">Цех</th>
                @if (Route::has('login'))
                    @if(Auth::user()->active === 2)
                        <th scope="col">Actions</th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($car_parks as $car_park)
                <tr>
                    <th scope="row">{{ $car_park->models->name }}</th>
                    <td>{{ $car_park->types->type }}</td>
                    <td>{{ $car_park->garages->name }}</td>
                    <td>{{ $car_park->services->name }}</td>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                            <td>
                                <a href="{{ route('edit_car_park', $car_park->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::open(['route' => ['destroy_car_park', $car_park->id],'method' => 'DELETE']) !!}
                                <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
                    {!! Form::open(array('url' => 'add/car_park')) !!}
                    <tr>
                        <td>
                            <div class="form-group">
                                <lable for="id_model"></lable>
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
                        </td>
                        <td>
                            <div class="form-group">
                                <lable for="id_type"></lable>
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
                        </td>
                        <td>
                            <div class="form-group">
                                <lable for="id_garage"></lable>
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
                        </td>
                        <td>
                            <div class="form-group">
                                <lable for="id_service"></lable>
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
                        </td>
                        <td>
                            {!! Form::submit('Добавить',['class' => 'btn btn-success']) !!}
                        </td>
                    </tr>
                    {!! Form::close() !!}
                @endif
            @endif
            </tbody>
        </table>

        <br>

        <div {{--class="col-md-4"--}}>
            <div>
                {{ $car_parks->links() }}
            </div>
        </div>
    </div>

    <br>

@endsection


