@extends('layouts.app')

@section('title-block') Таблица "Авторы" @endsection

@section('content')
    <div class="text-left">
        <a href="{{ route('lab3_index_view') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="text-center">

        <h1>Таблица "Авторы"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Автор</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">Дата смерти</th>
                @if (Route::has('login'))
                    @if(Auth::user()->active === 2)
                <th scope="col">Actions</th>
                    @endif
                    @endif
            </tr>
            </thead>
            <tbody>
            @foreach($autors as $autor)
                <tr>
                    <th scope="row">{{ $autor->FIO }}</th>
                    <td>{{ $autor->dateB }}</td>
                    <td>{{ $autor->dateD }}</td>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                    <td>
                        <a href="{{ route('lab3_autors_edit', $autor->id) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        {!! Form::open(['route' => ['lab3_autors_destroy', $autor->id],'method' => 'DELETE']) !!}
                        <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                    </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
            {!! Form::open(array('url' => 'add_author')) !!}
            <tr>
                <td>
                    <div class="form-group">
                        {!! Form::text('FIO',null,['placeholder' => 'Введите фамилию', 'id' => 'FIO', 'class' => 'form-control']) !!}
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        {!! Form::date('dateB',null,['placeholder' => 'Выберите дату', 'id' => 'dateB', 'class' => 'form-control']) !!}
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        {!! Form::date('dateD',null,['placeholder' => 'Выберите дату', 'id' => 'dateD', 'class' => 'form-control']) !!}
                    </div>
                </td>
                <td>
                    {!! Form::submit('Добавить автора',['class' => 'btn btn-success']) !!}
                </td>
            </tr>
            {!! Form::close() !!}
                @endif
            @endif
            </tbody>
        </table>

        <br>

        <div {{--class="col-md-4"--}}>
            <div>
                {{ $autors->links() }}
            </div>
        </div>
    </div>

    <br>

@endsection