@extends('layouts.app')

@section('title-block') Изменить данные о списании №{{$write_offs->id}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_write_offs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить данные о списании №{{$write_offs->id}}</h1>

        {!! Form::open(['route' => ['update_write_off', $write_offs->id],'method' => 'PUT']) !!}

        <div class="form-group">
            <lable for="id_model">Заново выберете авто:</lable>
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

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection
