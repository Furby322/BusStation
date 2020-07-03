@extends('layouts.app')

@section('title-block') Таблица "Цехи обслуживания" @endsection

@section('content')
    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="text-center">

        <h1>Таблица "Цехи обслуживания"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Цех</th>
                <th scope="col">Участок</th>
                @if (Route::has('login'))
                    @if(Auth::user()->active === 2)
                        <th scope="col">Actions</th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($service_workshops as $service_workshop)
                <tr>
                    <th scope="row">{{ $service_workshop->name }}</th>
                    <td>{{ $service_workshop->plots->name }}</td>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                            <td>
                                <a href="{{ route('edit_service', $service_workshop->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::open(['route' => ['destroy_service', $service_workshop->id],'method' => 'DELETE']) !!}
                                <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
                    {!! Form::open(array('url' => 'add/service')) !!}
                    <tr>
                        <td>
                            <div class="form-group">
                                {!! Form::text('name',null,['placeholder' => 'Введите название Цеха', 'id' => 'name', 'class' => 'form-control']) !!}
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
                {{ $service_workshops->links() }}
            </div>
        </div>
    </div>

    <br>

@endsection

