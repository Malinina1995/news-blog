@extends('block.main')

@section('title') Редактирование новости @endsection

@section('content')
    <div class="container content">
        <form class="form m-lg-5 needs-validation" action="{{route('updateNews', $news->id)}}" method="post" novalidate id="updateForm">
            @csrf
            <div class="form-group mt-5">
                <label for="title">Введите заголовок новости</label>
                <input type="text" name="title" class="form-control" required maxlength="127" value="{{$news->title}}">
                <div class="invalid-feedback">
                    Заполните поле
                </div>
            </div>
            <div class="form-group">
                <label for="short">Введите текст анонса </label>
                <textarea class="form-control" name="short" rows="3" required maxlength="255">{{$news->short}}</textarea>
                <div class="invalid-feedback">
                    Заполните поле
                </div>
            </div>
            <div class="form-group">
                <label for="image">Введите адрес картинки</label>
                <input type="text" name="image" class="form-control" required maxlength="511" value="{{$news->image_path}}">
                <div class="invalid-feedback">
                    Заполните поле
                </div>
            </div>
            <div class="form-group">
                <label for="full">Ввведите полный текст новости</label>
                <textarea class="form-control" name="full" rows="5" required>{{$news->full}}</textarea>
                <div class="invalid-feedback">
                    Заполните поле
                </div>
            </div>
            <button type="submit" name="send" class="btn btn-primary">Отредактировать</button>
        </form>
    </div>
    <script>
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                let form = document.getElementById('updateForm');

                form.addEventListener('submit', function (event) {

                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            }, false);
        })();

    </script>
@endsection
