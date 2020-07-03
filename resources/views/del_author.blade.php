@extends('layouts.app')

@section('title-block') Лаб-2 @endsection

@section('content')

    <div class="col-mb-8">
        <h1>Удалить автора</h1>

        {!! Form::open(array('url' => 'del_author')) !!}

        <div class="form-group">
            {!! Form::label('id', 'id втора:') !!}
            {!! Form::number('id',null,['placeholder' => 'Введите id', 'id' => 'id', 'class' => 'form-control']) !!}
        </div>


        {!! Form::submit('Удалить автора',['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}

    </div>


@endsection
