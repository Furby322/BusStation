@extends('layouts.app')

@section('title-block') Изменить данные о рабочем - {{$workers->name}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_workers') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить данные о рабочем - {{$workers->name}}</h1>

        {!! Form::open(['route' => ['update_worker', $workers->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('name', 'ФИО рабочего:') !!}
            {!! Form::text('name',$workers->name,['id' => 'name', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <lable for="id_foreman">Заново выберете бригадира:</lable>
            <select name="id_foreman"
                    id="id_foreman"
                    class="form-control"
                    style="">
                @foreach($foremans as $foreman)
                    <option value="{{ $foreman->id }}">
                        {{ $foreman->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection
