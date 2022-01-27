@extends('layouts.start')
@section('goToAdmin')
    <a class="nav-link" href="{{ route('admin.categories.index') }}">Войти</a>
@endsection
@section('goToRegister')
    <a class="nav-link" href="{{ route('register.index') }}">Зарегистрироваться</a>
@endsection
@section('content')
    <h1>Агрегатор новостей</h1>
    <p class="lead">Добро пожаловать на самый быстрый агрегатор новостей</p>
    <p class="lead">
        <a href="{{ route('category.index') }}" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Начать...</a>
    </p>
@endsection
