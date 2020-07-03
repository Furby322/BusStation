@extends('layouts.app')

@section('title-block')
    Priv!
@endsection

@section('content')
<h1> About </h1>
@endsection

@section('aside')
    @parent
    <p>Доп текст</p>
@endsection