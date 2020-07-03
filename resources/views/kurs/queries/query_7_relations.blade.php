@extends('layouts.app')

@section('title-block') Таблица "Отношения" @endsection

@section('content')

    <div class="text-left">
        <a href="{{ route('welcome_kurs') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>

    <div class="text-center">
        <div class="row">
            <div class="col-md-3">
                <h2>Таблица "Сотрудники"</h2>

                <br>

                <table class="table table-dark {{--col-md-8--}}">
                    <thead>
                    <tr>
                        <th scope="col">Сотрудники</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($workers as $worker)
                        @php /** @var \App\Models\Masters $master */  @endphp
                        <tr>
                            <th scope="row">{{ $worker->name }}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <h2>Таблица "Бригадиры"</h2>

                <br>

                <table class="table table-dark {{--col-md-8--}}">
                    <thead>
                    <tr>
                        <th scope="col">Бригадиры</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($foremans as $foreman)
                        @php /** @var \App\Models\Masters $master */  @endphp
                        <tr>
                            <th scope="row">{{ $foreman->name }}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <h2>Таблица "Мастера"</h2>

                <br>

                <table class="table table-dark {{--col-md-8--}}">
                    <thead>
                    <tr>
                        <th scope="col">Мастера</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($masters as $master)
                        @php /** @var \App\Models\Masters $master */  @endphp
                        <tr>
                            <th scope="row">{{ $master->name }}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <h2>Таблица "Начальники"</h2>

                <br>

                <table class="table table-dark {{--col-md-8--}}">
                    <thead>
                    <tr>
                        <th scope="col">Начальники</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($plots as $plot)
                        @php /** @var \App\Models\Masters $master */  @endphp
                        <tr>
                            <th scope="row">{{ $plot->name_manager }}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <br>

        <h1>Таблица "Отношений"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Сотрудник</th>
                <th scope="col">Бригадир</th>
                <th scope="col">Мастер</th>
                <th scope="col">Начальник участка</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workers as $worker)
                @php /** @var \App\Models\Masters $master */  @endphp
                <tr>
                    <th scope="row">{{ $worker->name }}</th>
                    <td>{{ $worker->foremans->name }}</td>
                    <td>{{ $worker->foremans->masters->name }}</td>
                    <td>{{ $worker->foremans->masters->plots->name_manager }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

{{--        <div --}}{{--class="col-md-4"--}}{{-->--}}
{{--            <div>--}}
{{--                {{ $workers->links() }}--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection