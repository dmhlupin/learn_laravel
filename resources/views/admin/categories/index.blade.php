@extends('layouts.admin')

@section('header')
    <h1 class="h2">Список категорий</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.categories.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>

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

                <th>Editing</th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                        <div class="btn-group" data-toggle="buttons">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', ['category' => $category]) }}">Редактировать</a>&nbsp;
                            <form method="POST" action="{{ route('admin.categories.destroy', ['category' => $category]) }}">
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
        {{ $categories->links() }}
    </div>
@endsection
