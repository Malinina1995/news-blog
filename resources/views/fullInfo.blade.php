@extends('block.main')

@section('title') {{$news->title}} @endsection

@section('content')
    <div class="row mt-5">
        @if($news->count())
            <div>
                <div class="aContainer">
                    <a href="/">Вернуться назад к списку новостей</a>
                </div>
                <div class="hContainer">
                    <h2>{{$news->title}}</h2>
                </div>
                <img src="{{$news->image_path}}" class="card-img-top imageFull" alt="...">
                <div class="fullInfo">{{$news->full}}</div>
                @if(Auth::user() && Auth::user()->can('edit-news'))
                    <a href="{{ route('updateLink', $news->id) }}" class="mb-5 btn btn-primary">Редактировать</a>
                @endif

                @if(Auth::user()&& Auth::user()->can('delete-news'))
                    <a href="{{ route('deleteLink', $news->id) }}" class="mb-5 btn btn-danger">Удалить новость</a>
                @endif
            </div>

        @else
            <div class="hContainer">
                <h3>Новость не найдена!</h3>
            </div>
        @endif
    </div>
@endsection
