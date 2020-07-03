@extends('layouts.app')

@section('title-block')Вся инфа@endsection

@section('content')
    <h1> Инфа </h1>
    @foreach(@$data as $el)
        <div class="alert alert-info">
            <h3>{{ $el->message }}</h3>
            <p>{{ $el->email }}</p>
            <p><small>{{ $el->created_at }}</small></p>
        </div>
    @endforeach

@endsection