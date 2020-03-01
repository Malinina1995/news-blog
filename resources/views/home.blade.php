@extends('block.main')

@section('title') BadlyNews @endsection

@section('content')
    <div class="row mt-5">
        @if($news->count())
            @foreach($news as $item)
                <div class="col-sm-4 mb-5">
                    <div class="card">
                        <img src="{{$item->image_path}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->title}}</h5>
                            <p class="card-text">{{$item->short}}</p>
                            <a href="{{route('newsLink', $item->id)}}" class="btn btn-primary">Показать больше</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="hContainer">
                <h3>Новостей нет, но вы можете добавить их</h3>
            </div>
        @endif
    </div>
@endsection
