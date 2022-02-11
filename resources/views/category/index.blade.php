@extends('layouts.main')
@section('title')
    Список категорий
@stop
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Категории новостей</h1>
            <p class="lead text-muted">Выберите категорию для продолжения:</p>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @forelse($categories as $cat)

                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        <div class="card-body">
                            <p class="card-text">{!! $cat->title !!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('category.show', ['category' => $cat]) }}" type="button" class="btn btn-sm btn-outline-secondary">Перейти</a>

                                </div>
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

