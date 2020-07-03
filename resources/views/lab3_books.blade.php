@extends('layouts.app')

@section('title-block') Таблица "Книги" @endsection

@section('content')
    <div class="text-left">
        <a href="{{ route('lab3_index_view') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <div class="text-center">
        <h1>Таблица "Книги"</h1>

        <br>

        <table class="table table-dark {{--col-md-8--}}">
            <thead>
            <tr>
                <th scope="col">Книга</th>
                <th scope="col">Описание</th>
                <th scope="col">Год написания</th>
                @if (Route::has('login'))
                @if(Auth::user()->active === 2)
                <th scope="col">Action</th>
                @endif
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{ $book->NameBook }}</th>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->yearW }}</td>
                    @if (Route::has('login'))
                        @if(Auth::user()->active === 2)
                    <td>
                        <a href="{{ route('lab3_books_edit', $book->id) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        {!! Form::open(['route' => ['lab3_books_destroy', $book->id],'method' => 'DELETE']) !!}
                        <button onclick="return confirm('Вы хотите удалить запись?')"><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                    </td>
                        @endif
                    @endif

                </tr>
            @endforeach
            @if (Route::has('login'))
                @if(Auth::user()->active === 2)
            {!! Form::open(array('url' => 'add_books')) !!}
            <tr>
                <td>
                    <div class="form-group">
                        {!! Form::text('NameBook',null,['placeholder' => 'Введите название', 'id' => 'NameBook', 'class' => 'form-control']) !!}
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        {!! Form::text('description',null,['placeholder' => 'Введите описание', 'id' => 'description', 'class' => 'form-control']) !!}
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        {!! Form::number('yearW',null,['placeholder' => 'Введите год написания', 'id' => 'yearW', 'class' => 'form-control']) !!}
                    </div>
                </td>
                <td>
                    {!! Form::submit('Добавить книгу',['class' => 'btn btn-success']) !!}
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
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection