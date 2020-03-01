@extends('block.main')

@section('title') Удаление новости @endsection

@section('content')
    <div class="container content hContainer mt-5">
        <h2>Вы уверены, что хотите удалить новость?</h2>
        <form class="form m-lg-5" action="{{route('exactlyDelete', $news->id)}}" method="post">
            @csrf
            <button type="submit" name="send" class="btn btn-danger">Да</button>
            <a href="{{route('newsLink', $news->id)}}" class="btn btn-primary">Нет</a>
        </form>
    </div>
@endsection
