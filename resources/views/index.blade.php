@extends('layouts.app')

@section('content')
    <h2 class="heading"> Последние новости</h2>
    <div class="articles__box">

        @for($i = 1; $i <= 3; $i++)
            <div class="article__item">
                <div class="up">
                    <a class="article__item__heading">{{ $last_news[$i]['title'] }}</a>
                    <div class="under_up">
                        <p class="date_of_post">Опубликовано: <span class="date">{{ $last_news[$i]['date_of_public'] }}</span></p>
                        <p class="category">Категория: <span class="category_name">{{ $categories[$last_news[$i]['category_id']]['name'] }}</span></p>
                    </div>
                </div>
                <div class="article">
                    <a href="#" class="img__container">
                        <img src="/images/preview.jpg" alt="preview">
                    </a>
                    <div class="article__info">
                        <p class="article__desc">
                            {{ $last_news[$i]['inform'] }}
                        </p>
                        <a href="#" class="continue">Подробнее...</a>
                    </div>
                </div>
            </div>
        @endfor

    </div>
@endsection

@section($add)
    @include($add)
@endsection


