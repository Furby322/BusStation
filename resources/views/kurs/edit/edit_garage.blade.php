@extends('layouts.app')

@section('title-block') Изменить данные о гараже - {{$garages->name}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_garages') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить данные о гараже - {{$garages->name}}</h1>

        {!! Form::open(['route' => ['update_garage', $garages->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Гараж:') !!}
            {!! Form::text('name',$garages->name,['id' => 'name', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <lable for="id_plot">Заново выберете участок:</lable>
            <select name="id_plot"
                    id="id_plot"
                    class="form-control"
                    style="">
                @foreach($plots as $plot)
                    <option value="{{ $plot->id }}">
                        {{ $plot->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection
