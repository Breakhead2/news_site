@extends('layouts.app')

@section('content')
    <div class="article__block">
        <div class="article__top">
            <div class="image__container">
                @if($article->image)
                    <img src="/storage/images/articles/{{ $article->id }}/{{ $article->image }}" alt="preview">
                @elseif($article->image_url)
                    <img src="{{ $article->image_url }}" alt="preview">
                @else
                    <img src="{{ asset('storage/images/articles/default.png') }}" alt="preview">
                @endif
            </div>
            <div class="under_up">
                <p class="date_of_post">Опубликовано: <span class="date">{{ $article->created_at }}</span></p>
                <p class="category">Категория: <a href="{{ route('news.category', $article->slug) }}" class="category_name">{{ $article->type }}</a></p>
            </div>
        </div>
        <div class="article__item__bottom">
            <h3 class="article__item__head">{{ $article->title }}</h3>
            <p class="article__desc">
                {!! $article->inform !!}
            </p>
        </div>
    </div>
@endsection
