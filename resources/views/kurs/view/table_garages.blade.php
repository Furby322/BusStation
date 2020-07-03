@extends('layouts.app')

@section('title-block') Таблица "Гаражи" @endsection

@section('content')
    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="text-center">

        <h1>Таблица "Гаражи"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Гараж</th>
                <th scope="col">Участок</th>
                @if (Route::has('login'))
                    @if(Auth::user()->active === 2)
                        <th scope="col">Actions</th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($garages as $garage)
                <tr>
                    <th scope="row">{{ $garage->name }}</th>
                    <td>{{ $garage->plots->name }}</td>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                            <td>
                                <a href="{{ route('edit_garage', $garage->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::open(['route' => ['destroy_garage', $garage->id],'method' => 'DELETE']) !!}
                                <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
                    {!! Form::open(array('url' => 'add/garage')) !!}
                    <tr>
                        <td>
                            <div class="form-group">
                                {!! Form::text('name',null,['placeholder' => 'Введите название гаража', 'id' => 'name', 'class' => 'form-control']) !!}
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <lable for="id_plot"></lable>
                                <select name="id_plot"
                                        id="id_plot"
                                        class="form-control"
                                        style="">
                                    @foreach($plots as $plot)
                                        <option value="{{ $plot->id }}">
                                            {{ $plot->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
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
                {{ $garages->links() }}
            </div>
        </div>
    </div>

    <br>

@endsection

