@extends('layouts.app')

@section('title-block') Таблица "Водители" @endsection

@section('content')
    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="text-center">

        <h1>Таблица "Водители"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">ФИО водителя</th>
                <th scope="col">Марка авто</th>
                @if (Route::has('login'))
                    @if(Auth::user()->active === 2)
                        <th scope="col">Actions</th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($drivers as $driver)
                <tr>
                    <th scope="row">{{ $driver->name }}</th>
                    <td>{{ $driver->car_park->models->name }}</td>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                            <td>
                                <a href="{{ route('edit_driver', $driver->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::open(['route' => ['destroy_driver', $driver->id],'method' => 'DELETE']) !!}
                                <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
                    {!! Form::open(array('url' => 'add/driver')) !!}
                    <tr>
                        <td>
                            <div class="form-group">
                                {!! Form::text('name',null,['placeholder' => 'Введите ФИО водителя', 'id' => 'name', 'class' => 'form-control']) !!}
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <lable for="id_car"></lable>
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
                {{ $drivers->links() }}
            </div>
        </div>
    </div>

    <br>

@endsection


