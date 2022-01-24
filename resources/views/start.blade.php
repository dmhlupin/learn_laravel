@extends('layouts.start')
@section('goToAdmin')
    <a class="nav-link" href="{{ route('admin.categories.index') }}">Войти</a>
@endsection
@section('start')
    <p class="lead">
        <a href="{{ route('category.index') }}" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Начать...</a>
    </p>
@endsection
