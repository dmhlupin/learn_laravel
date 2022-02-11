@extends('layouts.admin')

@section('header')
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>

        </div>
    </div>
@endsection

@section('content')
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Categories</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Date to add</th>
                    <th>Editing</th>
                </tr>
            </thead>
            <tbody>
                @foreach($newsList as $news)
                    <tr>
                        <td>{{ $news->id }}</td>
                        <td>{{ $news->title }}</td>
                        <td>
                            @foreach($news->categories as $category)
                                {{ $category->title }}
                            @endforeach
                        </td>
                        <td>{{ $news->author }}</td>
                        <td>{{ $news->status }}</td>
                        <td>{{ $news->created_at }}</td>
                        <td>
                            <div class="btn-group" data-toggle="buttons">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.news.edit', ['news' => $news]) }}">Редактировать</a>&nbsp;
                                <form method="POST" action="{{ route('admin.news.destroy', ['news' => $news]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-primary btn-sm" style="float:right">Удалить</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $newsList->links() }}
    </div>
@endsection
