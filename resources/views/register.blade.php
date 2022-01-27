@extends('layouts.start')
@section('goToAdmin')
    <a class="nav-link" href="{{ route('admin.categories.index') }}">Войти</a>
@endsection
@section('goToRegister')
    <a class="nav-link @if(request()->routeIs('register.*')) active @endif" href="#">Зарегистрироваться</a>
@endsection
@section('content')
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div class=""form-group>
            <label for="name">Введите имя:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class=""form-group>
            <label for="email">Введите email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class=""form-group>
            <label for="password">Введите пароль:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class=""form-group>
            <label for="password_re">Повторите пароль:</label>
            <input type="password" class="form-control" id="password_re" name="password_re">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Зарегистрироваться</button>

    </form>
@endsection
