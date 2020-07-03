@extends('layouts.app')

@section('title-block') Лаб-2 @endsection

@section('content')


    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Автор</th>
            <th scope="col">Дата рождения</th>
            <th scope="col">Дата смерти</th>
        </tr>
        </thead>
        <tbody>
        @foreach($autors as $autor)
        <tr>
            <th scope="row">{{ $autor->id }}</th>
            <td>{{ $autor->FIO }}</td>
            <td>{{ $autor->dateB }}</td>
            <td>{{ $autor->dateD }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

<br>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div>
            {{ $autors->links() }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="text-center">
            <div class="links">
                <a type="button" href="{{ route('del_author_view') }}" class="btn btn-danger">Удалить автора</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="text-right">
            <div class="links">
                <a type="button" href="{{ route('add_author_view') }}" class="btn btn-primary">Добавить автора</a>
            </div>
        </div>
    </div>
</div>
    <br>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Жанр</th>
        </tr>
        </thead>
        <tbody>
        @foreach($janr as $janrs)
            <tr>
                <th scope="col">{{ $janrs->id }}</th>
                <th>{{ $janrs->nameG }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Автор</th>
            <th scope="col">Книга</th>
        </tr>
        </thead>
        <tbody>

            @foreach($aut1->books as $auto1)
            <tr>
                <th>{{ $aut1->FIO }}</th>
                <th>{{ $auto1->NameBook }}</th>
            </tr>
            @endforeach

            @foreach($aut2->books as $auto2)
                <tr>
                    <th>{{ $aut2->FIO }}</th>
                    <th>{{ $auto2->NameBook }}</th>
                </tr>
            @endforeach

            @foreach($aut3->books as $auto3)
                <tr>
                    <th>{{ $aut3->FIO }}</th>
                    <th>{{ $auto3->NameBook }}</th>
                </tr>
            @endforeach

        </tbody>
    </table>

    <br>

    <h1 class="text-center">
        Книги написанные в 20 веке.
    </h1>

    <br>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Книга</th>
            <th scope="col">Год написания</th>
        </tr>
        </thead>
        <tbody>

        @foreach($book as $books)
            <tr>
                <th scope="row">{{ $books->NameBook }}</th>
                <th>{{ $books->yearW }}</th>
            </tr>
        @endforeach


        </tbody>
    </table>

    <h1 class="text-center">
        Количество книг у авторов
    </h1>

    <br>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Автор</th>
            <th scope="col">Книги</th>
        </tr>
        </thead>
        <tbody>

        @for($id = 0; $id < 3; $id++)
            <tr>
                <th scope="row">{{ $authors_count[$id]->FIO }}</th>
                <th>{{ $book_id_a[$id] }}</th>
            </tr>
        @endfor


        </tbody>
    </table>

    <br>

    <h2 class="text-center">
        Поиск книги по слову в названии
    </h2>

    {!! Form::open(array('url' => 'search/book')) !!}

    <div class="form-group text-center">
        {!! Form::label('word', 'Слово:') !!}
        {!! Form::text('word',null,['placeholder' => 'Введите слово', 'id' => 'word', 'class' => 'form-control']) !!}
    </div>

    <div class="text-center">
        {!! Form::submit('Найти книг(y/и)',['class' => 'btn btn-success ']) !!}
    </div>


    {!! Form::close() !!}

    <br>









@endsection