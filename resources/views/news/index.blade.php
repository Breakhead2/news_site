@extends('layouts.app')

@section('content')
    <div class="news">
        <div class="categories__block">
            <ul class="categories">
                @foreach($categories as $category)
                    <li class="categories__list">
                        <a class="categories__link" href="{{ route('news.category', $category['slug']) }}">{{ $category['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="news__block">
                <div class="news__box">
                    @foreach($news as $item)
                        @include('news.card_news')
                    @endforeach
                </div>
            </div>
    </div>
@endsection
