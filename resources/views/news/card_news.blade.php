
<div class="article__item">
    <div class="up">
        @if($item->isPrivate)
            <h3 class="article__item__heading">{{ $item->title }}</h3>
        @else
            <a href="{{ route('news.show', [$item->slug, $item]) }}" class="article__item__link">{{ $item->title }}</a>
        @endif

        <div class="under_up">
                <p class="date_of_post">Опубликовано: <span class="date">{{ $item->created_at }}</span></p>
                <p class="category">Категория: <a href="{{ route('news.category', $item->slug) }}" class="category_name">{{ $item->name }}</a></p>
        </div>
    </div>
    <div class="article">

        @if($item->isPrivate)
            <div class="img__container">
                <img src="/storage/images/{{ $item->image }}" alt="preview">
            </div>
        @else
            <a href="{{ route('news.show', [$item->slug, $item]) }}" class="img__container">
                <img src="/storage/images/{{ $item->image }}" alt="preview">
            </a>
        @endif

        <div class="article__info">
            <p class="article__desc">
                {{ $item->desc }}
            </p>
            @if($item->isPrivate)
                <a href="{{ route('login') }}" class="message">Авторизуйтесь</a>
            @else
                <a href="{{ route('news.show', [$item->slug, $item]) }}" class="continue">Подробнее...</a>
            @endif
        </div>

    </div>
</div>

