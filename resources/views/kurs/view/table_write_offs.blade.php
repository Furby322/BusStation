@extends('layouts.app')

@section('title-block') Таблица "Списание" @endsection

@section('content')
    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="text-center">

        <h1>Таблица "Списание"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Авто</th>
                <th scope="col">Дата</th>
                @if (Route::has('login'))
                    @if(Auth::user()->active === 2)
                        <th scope="col">Actions</th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($write_offs as $write_off)
                <tr>
                    <th scope="row">{{ $write_off->models->name }}</th>
                    <td>{{ $write_off->date }}</td>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                            <td>
                                <a href="{{ route('edit_write_off', $write_off->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::open(['route' => ['destroy_write_off', $write_off->id],'method' => 'DELETE']) !!}
                                <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
                    {!! Form::open(array('url' => 'add/write_off')) !!}
                    <tr>
                        <td>
                            <div class="form-group">
                                <lable for="id_model"></lable>
                                <select name="id_model"
                                        id="id_model"
                                        class="form-control"
                                        style="">
                                    @foreach($models as $model)
                                        <option value="{{ $model->id }}">
                                            {{ $model->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td></td>
                        <td>
                            {!! Form::submit('Добавить',['class' => 'btn btn-success']) !!}
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
                {{ $write_offs->links() }}
            </div>
        </div>
    </div>

    <br>

@endsection






