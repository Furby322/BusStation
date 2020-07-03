@extends('layouts.app')

@section('title-block') Изменить данные о бренде - {{$brands->name}} @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('table_brands') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="col-mb-8">
        <h1>Изменить данные о бренде - {{$brands->name}}</h1>

        {!! Form::open(['route' => ['update_brand', $brands->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Бренд:') !!}
            {!! Form::text('name',$brands->name,['id' => 'name', 'class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection
