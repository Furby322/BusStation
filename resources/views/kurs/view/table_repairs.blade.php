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
                <th scope="col">Авто</th>
                <th scope="col">Рабочий</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Деталь</th>
                <th scope="col">Дата</th>
                @if (Route::has('login'))
                    @if(Auth::user()->active === 2)
                        <th scope="col">Actions</th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($repairs as $repair)
                <tr>
                    <th scope="row">{{ $repair->car_park->models->name }}</th>
                    <td>{{ $repair->workers->name }}</td>
                    <td>{{ $repair->price }}</td>
                    <td>{{ $repair->detail }}</td>
                    <td>{{ $repair->date }}</td>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                            <td>
                                <a href="{{ route('edit_repair', $repair->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::open(['route' => ['destroy_repair', $repair->id],'method' => 'DELETE']) !!}
                                <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
                    {!! Form::open(array('url' => 'add/repair')) !!}
                    <tr>
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
                            <div class="form-group">
                                <lable for="id_worker"></lable>
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
                        </td>
                        <td>
                            <div class="form-group">
                                {!! Form::text('price',null,['placeholder' => 'Введите стоимость', 'id' => 'price', 'class' => 'form-control']) !!}
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                {!! Form::text('detail',null,['placeholder' => 'Введите деталь', 'id' => 'detail', 'class' => 'form-control']) !!}
                            </div>
                        </td>
                        <td></td>
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
                {{ $repairs->links() }}
            </div>
        </div>
    </div>

    <br>

@endsection





