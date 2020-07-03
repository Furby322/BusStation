@extends('layouts.app')

@section('title-block') Изменить категорию - {{$types->type}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_type_transports') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить категорию - {{$types->type}}</h1>

        {!! Form::open(['route' => ['update_type_transport', $types->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('type', 'Категория:') !!}
            {!! Form::text('type',$types->type,['id' => 'type', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('characteristic', 'Основная характеристика:') !!}
            {!! Form::text('characteristic',$types->characteristic,['id' => 'characteristic', 'class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection