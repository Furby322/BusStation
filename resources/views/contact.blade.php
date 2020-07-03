@extends('layouts.app')

@section('title-block')Оставить отзыв!@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <h1> Отзыв о ресторане </h1>
            {!! Form::open(array('url' => 'contact')) !!}
            <div class="form-group">
                {!! Form::label('name', 'Введите имя:') !!}
                {!! Form::text('name',null,['placeholder' => 'Введите имя', 'id' => 'name', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Введите email:') !!}
                {!! Form::email('email',null,['placeholder' => 'Введите email', 'id' => 'email', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('age', 'Введите возраст:') !!}
                {!! Form::number('age',null,['placeholder' => 'Введите возраст', 'id' => 'age', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('date', 'Дата посещения:') !!}
                {!! Form::date('date',null,['placeholder' => 'дд-мм-гггг', 'id' => 'date', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('country', 'Любимая кухня:') !!}
                <br>
                {!! Form::select('country', array('Русская' => 'Русская', 'Украинская' => 'Украинская', 'Итальянская' => 'Итальянская'),['class' => 'form-control', 'id' => 'country']); !!}
            </div>

            <div class="form-group">
                {!! Form::label('recom', 'Pекомендуете нас друзьям?'); !!}
                <br>
                {!! Form::radio('recom', 'Да', true) !!}
                Да
                {!! Form::radio('recom', 'Нет', false) !!}
                Нет
            </div>

            <div class="form-group">
                {!! Form::label('message', 'Отзыв:') !!}
                {!! Form::textarea('message',null,['placeholder' => 'Введите отзыв', 'id' => 'message', 'class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Оставить отзыв',['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
        <div class="col-4">
            <h1> Отзыв </h1>

            {{--    @foreach($data as $el)--}}
            <table class="table">
                <thead>
                <tr>
                    <th>Имя посетителя</th>
                    <th>{{ isset($view) ? $view->name : ' ' }}</th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>{{ isset($view) ? $view->email : ' ' }}</th>
                </tr>
                <tr>
                    <th>Возраст</th>
                    <th>{{ isset($view) ? $view->age : ' '}}</th>
                </tr>
                <tr>
                    <th>Дата посещения</th>
                    <th>{{ isset($view) ? $view->date : ' '}}</th>
                </tr>
                <tr>
                    <th>Любимая кухня</th>
                    <th>{{ isset($view) ? $view->country : ' '}}</th>
                </tr>
                <tr>
                    <th>Рекомендация друзьям</th>
                    <th>{{ isset($view) ? $view->recom : ' '}}</th>
                </tr>
                <tr>
                    <th>Отзыв</th>
                    <th>{{ isset($view) ? $view->message : ' '}}</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
