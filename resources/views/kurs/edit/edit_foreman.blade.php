@extends('layouts.app')

@section('title-block') Изменить данные о бригадире - {{$foremans->name}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_foremans') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить данные о бригадире - {{$foremans->name}}</h1>

        {!! Form::open(['route' => ['update_foreman', $foremans->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('name', 'ФИО бригадира:') !!}
            {!! Form::text('name',$foremans->name,['id' => 'name', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <lable for="id_master">Заново выберете мастера:</lable>
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

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection
