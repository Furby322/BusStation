@extends('layouts.app')

@section('title-block') Слово @endsection

@section('content')
    <div class="text-left">
        <a href="{{ route('lab3_index_view') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="text-center">

        <h1>Таблица "Жанры"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Жанры</th>
                @if (Route::has('login'))
                    @if(Auth::user()->active === 2)
                <th scope="col">Action</th>
                    @endif
                    @endif
            </tr>
            </thead>
            <tbody>
            @foreach($janrs as $janr)
                <tr>
                    <th scope="row">{{ $janr->nameG }}</th>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                    <td>
                        <a href="{{ route('lab3_janrs_edit', $janr->id) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        {!! Form::open(['route' => ['lab3_janrs_destroy', $janr->id],'method' => 'DELETE']) !!}
                        <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                    </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
            {!! Form::open(array('url' => 'add_janrs')) !!}
            <tr>
                <td>
                    <div class="form-group">
                        {!! Form::text('nameG',null,['placeholder' => 'Введите название жанра', 'id' => 'NameG', 'class' => 'form-control']) !!}
                    </div>
                </td>
                <td>
                    {!! Form::submit('Добавить жанр',['class' => 'btn btn-success']) !!}
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
                {{ $janrs->links() }}
            </div>
        </div>


    </div>
@endsection