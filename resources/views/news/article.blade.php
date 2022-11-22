@extends('layouts.app')

@section('content')
    <div class="article__block">
        <div class="article__top">
            <div class="image__container">
                <img src="/storage/images/{{ $article->image }}" alt="back">
            </div>
            <div class="under_up">
                <p class="date_of_post">Опубликовано: <span class="date">{{ $article->date_of_public }}</span></p>
                <p class="category">Категория: <a href="{{ route('news.category', $article->slug) }}" class="category_name">{{ $article->name }}</a></p>
            </div>
        </div>
        <div class="article__item__bottom">
            <h3 class="article__item__head">{{ $article->title }}</h3>
            <p class="article__desc">
                {{ $article->inform }}
            </p>
        </div>
    </div>
@endsection
