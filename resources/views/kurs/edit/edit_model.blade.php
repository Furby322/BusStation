@extends('layouts.app')

@section('title-block') Изменить данные о модели - {{$models->name}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_models') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить данные о модели - {{$models->name}}</h1>

        {!! Form::open(['route' => ['update_model', $models->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Модель:') !!}
            {!! Form::text('name',$models->name,['id' => 'name', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <lable for="id_brand">Заново выберете бренд:</lable>
            <select name="id_brand"
                    id="id_brand"
                    class="form-control"
                    style="">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection