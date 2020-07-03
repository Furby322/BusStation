@extends('layouts.app')

@section('title-block') Таблица "Категории" @endsection

@section('content')
    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="text-center">

        <h1>Таблица "Категории"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Категория</th>
                <th scope="col">Основная характеристика</th>
                @if (Route::has('login'))
                    @if(Auth::user()->active === 2)
                        <th scope="col">Actions</th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($types as $type)
                <tr>
                    <th scope="row">{{ $type->type }}</th>
                    <td>{{ $type->characteristic }}</td>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                            <td>
                                <a href="{{ route('edit_type_transport', $type->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::open(['route' => ['destroy_type_transport', $type->id],'method' => 'DELETE']) !!}
                                <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
                    {!! Form::open(array('url' => 'add/type_transport')) !!}
                    <tr>
                        <td>
                            <div class="form-group">
                                {!! Form::text('type',null,['placeholder' => 'Введите категорию', 'id' => 'type', 'class' => 'form-control']) !!}
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                {!! Form::text('characteristic',null,['placeholder' => 'Введите хар.', 'id' => 'characteristic', 'class' => 'form-control']) !!}
                            </div>
                        </td>
                        <td>
                            {!! Form::submit('Добавить категорию',['class' => 'btn btn-success']) !!}
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
                {{ $types->links() }}
            </div>
        </div>
    </div>

    <br>

@endsection
