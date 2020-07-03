@extends('layouts.app')

@section('title-block') Изменить книгу - {{$authors->FIO}} @endsection

@section('content')

    <div class="col-mb-8">
        <h1>Изменить жанр - {{$authors->FIO}}</h1>

        {!! Form::open(['route' => ['lab3_autors_update', $authors->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('FIO', 'Автор:') !!}
            {!! Form::text('FIO',$authors->FIO,['id' => 'FIO', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('dateB', 'Дата рождения:') !!}
            {!! Form::date('dateB',$authors->dateB,['id' => 'dateB', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('dateD', 'Дата смерти:') !!}
            {!! Form::date('dateD',$authors->dateD,['id' => 'dateD', 'class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection
