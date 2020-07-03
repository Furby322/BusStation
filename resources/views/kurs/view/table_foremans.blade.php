@extends('layouts.app')

@section('title-block') Таблица "Бригадиры" @endsection

@section('content')
    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="text-center">

        <h1>Таблица "Бригадиры"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">ФИО бригадира</th>
                <th scope="col">ФИО мастера</th>
                @if (Route::has('login'))
                    @if(Auth::user()->active === 2)
                        <th scope="col">Actions</th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($foremans as $foreman)
                <tr>
                    <th scope="row">{{ $foreman->name }}</th>
                    <td>{{ $foreman->masters->name }}</td>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                            <td>
                                <a href="{{ route('edit_foreman', $foreman->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::open(['route' => ['destroy_foreman', $foreman->id],'method' => 'DELETE']) !!}
                                <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
                    {!! Form::open(array('url' => 'add/foreman')) !!}
                    <tr>
                        <td>
                            <div class="form-group">
                                {!! Form::text('name',null,['placeholder' => 'Введите ФИО бригадира', 'id' => 'name', 'class' => 'form-control']) !!}
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <lable for="id_master"></lable>
                                <select name="id_master"
                                        id="id_master"
                                        class="form-control"
                                        style="">
                                    @foreach($masters as $master)
                                        <option value="{{ $master->id }}">
                                            {{ $master->name }}
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
                {{ $foremans->links() }}
            </div>
        </div>
    </div>

    <br>

@endsection


