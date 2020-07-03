@extends('layouts.app')

@section('title-block') Изменить участок - {{$plots->name}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_plots') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить участок - {{$plots->name}}</h1>

        {!! Form::open(['route' => ['update_plot', $plots->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Название:') !!}
            {!! Form::text('name',$plots->name,['id' => 'name', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name_manager', 'ФИО начальника:') !!}
            {!! Form::text('name_manager',$plots->name_manager,['id' => 'name_manager', 'class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection