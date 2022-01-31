@extends('layouts.main')
@section('title')
    Список новостей
@stop
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Категория: //</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div>
            <h2>{{ $news->title }}</h2>
            <p>Автор: {{ $news->author }} &nbsp; Дата добавления: {{ $news->created_at }}</p>
            <p>Источник: <a href="{{ $news->source }}">{{ $news->source }}</a></p>
            <p>{{ $news->description }}</p>
        </div><hr>
    </div>
@endsection


