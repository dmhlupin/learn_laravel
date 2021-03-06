@extends('layouts.admin')

@section('header')
    <h1 class="h2">Редактировать новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">


        </div>
    </div>
@endsection

@section('content')
{{--    @include('inc.message')--}}

    <form method="POST" action="{{ route('admin.news.update', ['news' => $news]) }}">
        @csrf
        @method('put')
        <div class=""form-group>
            <label for="title">Выбрать категории новостей</label>
            <select class="form-control" name="categories[]" id="categories" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                    @if(in_array($category->id, $selectCategories)) selected @endif
                    >{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class=""form-group>
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
            @error('title') <strong style="color:red"> {{ $message }} </strong>@enderror
        </div>
        <div class=""form-group>
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $news->author }}">
            @error('author') <strong style="color:red"> {{ $message }} </strong>@enderror
        </div>

        <div class=""form-group>
            <label for="status">Статус</label>
            <select name="status" id="status" class="form-control">
                <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class=""form-group>
            <label for="description">Текст статьи</label>
            <textarea class="form-control" id="description" name="description"> {!! $news->description !!} </textarea>
            @error('description') <strong style="color:red"></strong> {{ $message }} @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:right">Сохранить</button>

    </form>
@endsection

