@extends('layouts.app')

@section('title-block') Изменить книгу - {{$books->NameBook}} @endsection

@section('content')

    <div class="col-mb-8">
        <h1>Изменить книгу - {{$books->NameBook}}</h1>

        {!! Form::open(['route' => ['lab3_books_update', $books->id],'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('NameBook', 'Книга:') !!}
            {!! Form::text('NameBook',$books->NameBook,['id' => 'BookName', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Описание:') !!}
            {!! Form::text('description',$books->description,['id' => 'description', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('yearW', 'Год написания:') !!}
            {!! Form::number('yearW',$books->yearW,['id' => 'yearW', 'class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Изменить',['class' => 'btn btn-warning']) !!}

        {!! Form::close() !!}

    </div>


@endsection
