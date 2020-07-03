@extends('layouts.app')

@section('title-block') Лаб-2 @endsection

@section('content')

<div class="col-mb-8">
    <h1>Добавить автора</h1>

    {!! Form::open(array('url' => 'add_author1')) !!}

    <div class="form-group">
        {!! Form::label('FIO', 'Фамилия автора:') !!}
        {!! Form::text('FIO',null,['placeholder' => 'Введите фамилию', 'id' => 'FIO', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dateB', 'Дата рождения:') !!}
        {!! Form::date('dateB',null,['placeholder' => 'Выберите дату', 'id' => 'dateB', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dateD', 'Дата смерти:') !!}
        {!! Form::date('dateD',null,['placeholder' => 'Выберите дату', 'id' => 'dateD', 'class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Добавить автора',['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}

</div>


@endsection
