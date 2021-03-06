@extends('layouts.admin')

@section('header')
    <h1 class="h2">Добавить категорию новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">


        </div>
    </div>
@endsection

@section('content')
    @include('inc.message')

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        <div class=""form-group>
            <label for="title">Название категории</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:right">Сохранить</button>

    </form>
@endsection
