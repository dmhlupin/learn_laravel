@extends('layouts.main')
@section('title')
    Отзывы
@stop
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Оставить отзыв</h1>
            <p class="lead text-muted">Напишите свой комментарий / отзыв по работе проекта</p>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('feedback.store') }}">
            @csrf
            <div class=""form-group>
                <label for="name">Введите имя:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class=""form-group>
                <label for="description">Отзыв</label>
                <textarea class="form-control" id="description" name="description"> {!! old('description') !!} </textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float:right">Сохранить</button>

        </form>
    </div>
@endsection
