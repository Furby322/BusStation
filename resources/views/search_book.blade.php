@extends('layouts.app')

@section('title-block') Слово @endsection

@section('content')

@if( $search->count() >= 1 )
<div class="text-center">
    <h2>
        Книги содержащие в названии '{{ $word }}'
    </h2>

    <table class="table table-dark">
        <thead>
        <tr>
            <th style="font-weight: bold">Книг(а/и)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($search as $a)
            <tr>
                <th style="font-weight: normal">{{ $a->NameBook }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else

    <h2 class="text-center">
        Книг, содержащих '{{ $word }}', не обнаружено
    </h2>

@endif









@endsection
