@extends('block.main')

@section('title') Добавить новость @endsection

@section('content')
    <div class="container content">
        <form class="form m-lg-5 needs-validation" action="/add" method="post" novalidate id="addForm">
            @csrf
            <div class="form-group mt-5">
                <label for="title">Введите заголовок новости</label>
                <input type="text" name="title" class="form-control" required maxlength="127">
                <div class="invalid-feedback">
                    Заполните поле
                </div>
            </div>
            <div class="form-group">
                <label for="short">Введите текст анонса </label>
                <textarea class="form-control" name="short" rows="3" required maxlength="255"></textarea>
                <div class="invalid-feedback">
                    Заполните поле
                </div>
            </div>
            <div class="form-group">
                <label for="image">Введите адрес картинки</label>
                <input type="text" name="image" class="form-control" required maxlength="511">
                <div class="invalid-feedback">
                    Заполните поле
                </div>
            </div>
            <div class="form-group">
                <label for="full">Ввведите полный текст новости</label>
                <textarea class="form-control" name="full" rows="5" required></textarea>
                <div class="invalid-feedback">
                    Заполните поле
                </div>
            </div>
            <button type="submit" name="send" class="btn btn-primary">Добавить новость</button>
        </form>
    </div>
    <script>
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                let form = document.getElementById('addForm');

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
