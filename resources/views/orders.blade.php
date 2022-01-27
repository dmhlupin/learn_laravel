@extends('layouts.main')
@section('title')
    Оформление заказа
@stop
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Оформление заказа</h1>
            <p class="lead text-muted">Заполните форму для заказа сбора информации</p>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <div class=""form-group>
                <label for="name">Имя заказчика:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class=""form-group>
                <label for="phone">Телефон:</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>
            <div class=""form-group>
                <label for="email">"Электронная почта":</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class=""form-group>
                <label for="description">Описание заказа</label>
                <textarea class="form-control" id="description" name="description"> {!! old('description') !!} </textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float:right">Сохранить</button>

        </form>
    </div>
@endsection
