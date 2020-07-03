@extends('layouts.app')

@section('title-block') Таблица "Перевозки" @endsection

@section('content')
    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="text-center">

        <h1>Таблица "Перевозки"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Код заказа</th>
                <th scope="col">Марка авто</th>
                <th scope="col">Тип перевозки</th>
                @if (Route::has('login'))
                    @if(Auth::user()->active === 2)
                        <th scope="col">Actions</th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($transportations as $transportation)
                <tr>
                    <th scope="row">{{ $transportation->id }}</th>
                    <td>{{ $transportation->car_park->models->name }}</td>
                    <td>{{ $transportation->type }}</td>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                            <td>
                                <a href="{{ route('edit_transportation', $transportation->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::open(['route' => ['destroy_transportation', $transportation->id],'method' => 'DELETE']) !!}
                                <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
                    {!! Form::open(array('url' => 'add/transportation')) !!}
                    <tr>
                        <td></td>
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
                                {!! Form::text('type',null,['placeholder' => 'Введите тип перевозки', 'id' => 'type', 'class' => 'form-control']) !!}
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
                {{ $transportations->links() }}
            </div>
        </div>
    </div>

    <br>

@endsection




