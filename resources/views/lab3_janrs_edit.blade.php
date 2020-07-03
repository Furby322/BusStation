@extends('layouts.app')

@section('title-block') Изменить жанр - {{$janrs->nameG}} @endsection

@section('content')

    <div class="col-mb-8">
        <h1>Изменить жанр - {{$janrs->nameG}}</h1>

        {!! Form::open(['route' => ['lab3_janrs_update', $janrs->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('nameG', 'Жанр:') !!}
            {!! Form::text('nameG',$janrs->nameG,['id' => 'FIO', 'class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection
