@extends('layouts.app')

@section('content')
    <div class="news">
        <div class="categories__block">
            <ul class="categories">
                @forelse($categories as $category)
                    <li class="categories__list">
                        <a class="categories__link" href="{{ route('news.category', $category->slug) }}">{{ $category->type }}</a>
                    </li>
                @empty
                    <li class="categories__list">
                        Нет категорий
                    </li>
                @endforelse
            </ul>
            <div class="category__selector">
                <p>Категории</p>
                <i id="arrow" class="fa-sharp fa-solid fa-arrow-down"></i>
            </div>
        </div>
        <div class="news__block">
            <div class="news__box">
                @forelse($news as $item)
                    @include('news.card_news')
                @empty
                    <p class="empty__news">Нет новостей</p>
                @endforelse
            </div>
                {{ $news->links() }}
        </div>
    </div>
@endsection
