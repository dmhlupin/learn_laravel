@extends('layouts.main')
@section('title')
    Список новостей
@stop
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Категория: {{ $catTitle }} </h1>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @forelse($newsList as $news)

                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        <div class="card-body">
                            <p>
                                <a href="{{ route('news.show', ['id' => $news->id]) }}">
                                    <strong>
                                       {{ $news->title }}
                                    </strong>
                                </a>
                            </p>
                            <p>Автор: {{ $news->author }}</p>
                            <p class="card-text">{!! $news->description !!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('news.show', ['id' => $news->id]) }}" type="button" class="btn btn-sm btn-outline-secondary">Перейти</a>

                                </div>
                                <small class="text-muted">Дата добавления: <br>{{ $news->created_at }}</small>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <h3>Записей нет</h3>
            @endforelse
        </div>
    </div>
@endsection
