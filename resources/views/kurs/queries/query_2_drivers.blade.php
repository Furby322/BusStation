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
                <th scope="col">Водитель</th>
                <th scope="col">Машина</th>
            </tr>
            </thead>
            <tbody>
            @foreach($drivers as $driver)
                @php /** @var \App\Models\Masters $master */  @endphp
                <tr>
                    <th scope="row">{{ $driver->name }}</th>
                    {{--                    <td>{{ $car->type_transports->type  }}</td>--}}
                    <td>{{ $driver->car_park->models->name }}</td>
                </tr>
            @endforeach
            <tr>
                <td style="color: #5cd08d">Общее число водителей по предприятию</td>
                <td style="color: #5cd08d">{{ $count }}</td>
            </tr>
            </tbody>
        </table>

        <div {{--class="col-md-4"--}}>
            <div>
                {{ $drivers->links() }}
            </div>
        </div>

        <h1> По конкретному авто </h1>
        {!! Form::open(array('route' => 'query_2_post')) !!}

        <div class="form-group">
            <lable for="models">Модель авто</lable>
            <select name="models"
                    id="models"
                    class="form-control"
                    placeholder="Автомобиль">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">
{{--                        @if($categoryModel->id == $drivers->car_park->models->id) selected @endif--}}
                        {{ $car->models->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {!! Form::submit('Отобрать',['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}

        <br>
        <br>
    </div>
@endsection
