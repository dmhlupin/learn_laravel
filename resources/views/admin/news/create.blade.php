@extends('layouts.admin')

@section('header')
    <h1 class="h2">Добавить новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">


        </div>
    </div>
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <form method="POST" action="{{ route('admin.news.store') }}">
        @csrf
        <div class=""form-group>
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class=""form-group>
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
        </div>
        <div class=""form-group>
            <label for="status">Статус</label>
            <select name="status" id="status" class="form-control">
                <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class=""form-group>
            <label for="description">Текст статьи</label>
            <textarea class="form-control" id="description" name="description"> {!! old('description') !!} </textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:right">Сохранить</button>

    </form>
@endsection

