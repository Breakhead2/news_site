<div class="article__item">
    <div class="up">

        @if($item['isPrivate'])
            <h3 class="article__item__heading">{{ $item['title'] }}</h3>
        @else
            <a href="{{ route('news.show', [$categories[$item['category_id']]['slug'], $item['id']]) }}" class="article__item__link">{{ $item['title'] }}</a>
        @endif

        <div class="under_up">
                <p class="date_of_post">Опубликовано: <span class="date">{{ $item['date_of_public'] }}</span></p>
                <p class="category">Категория: <span class="category_name">{{ $categories[$item['category_id']]['name'] }}</span></p>
        </div>
    </div>
    <div class="article">

        @if($item['isPrivate'])
            <div class="img__container">
                <img src="/images/preview.jpg" alt="preview">
            </div>
        @else
            <a href="{{ route('news.show', [$categories[$item['category_id']]['slug'], $item['id']]) }}" class="img__container">
                <img src="/images/preview.jpg" alt="preview">
            </a>
        @endif

        <div class="article__info">
            <p class="article__desc">
                {{ $item['desc'] }}
            </p>
            @if($item['isPrivate'])
                <a href="{{ route('login') }}" class="message">Авторизуйтесь</a>
            @else
                <a href="{{ route('news.show', [$categories[$item['category_id']]['slug'], $item['id']]) }}" class="continue">Подробнее...</a>
            @endif
        </div>

    </div>
</div>

