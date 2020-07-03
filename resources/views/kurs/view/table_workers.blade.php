@extends('layouts.app')

@section('title-block') Таблица "Рабочие" @endsection

@section('content')
    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="text-center">

        <h1>Таблица "Рабочие"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">ФИО рабочего</th>
                <th scope="col">ФИО бригадира</th>
                @if (Route::has('login'))
                    @if(Auth::user()->active === 2)
                        <th scope="col">Actions</th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($workers as $worker)
                <tr>
                    <th scope="row">{{ $worker->name }}</th>
                    <td>{{ $worker->foremans->name }}</td>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                            <td>
                                <a href="{{ route('edit_worker', $worker->id) }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                {!! Form::open(['route' => ['destroy_worker', $worker->id],'method' => 'DELETE']) !!}
                                <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
                    {!! Form::open(array('url' => 'add/worker')) !!}
                    <tr>
                        <td>
                            <div class="form-group">
                                {!! Form::text('name',null,['placeholder' => 'Введите ФИО рабочего', 'id' => 'name', 'class' => 'form-control']) !!}
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <lable for="id_foreman"></lable>
                                <select name="id_foreman"
                                        id="id_foreman"
                                        class="form-control"
                                        style="">
                                    @foreach($foremans as $foreman)
                                        <option value="{{ $foreman->id }}">
                                            {{ $foreman->name }}
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
                {{ $workers->links() }}
            </div>
        </div>
    </div>

    <br>

@endsection



