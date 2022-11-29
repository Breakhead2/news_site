<div class="article__item">
    <div class="up">
        @guest
            <h3 class="article__item__heading">{{ $item->title }}</h3>
        @else
            <a href="{{ route('news.show', [$item->slug, $item]) }}" class="article__item__link">{{ $item->title }}</a>
        @endguest

        <div class="under_up">
                <p class="date_of_post">Опубликовано: <span class="date">{{ $item->created_at }}</span></p>
                <p class="category">Категория: <a href="{{ route('news.category', $item->slug) }}" class="category_name">{{ $item->name }}</a></p>
        </div>
    </div>
    <div class="article">

        @guest
            <div class="img__container">
                @if($item->image == 'preview.jpg')
                    <img src="/storage/images/articles/{{ $item->image }}" alt="preview">
                @else
                    <img src="/storage/images/articles/{{ $item->id }}/{{ $item->image }}" alt="preview">
                @endif
            </div>
        @else
            <a href="{{ route('news.show', [$item->slug, $item]) }}" class="img__container">
                @if($item->image == 'preview.jpg')
                    <img src="/storage/images/articles/{{ $item->image }}" alt="preview">
                @else
                    <img src="/storage/images/articles/{{ $item->id }}/{{ $item->image }}" alt="preview">
                @endif
            </a>
        @endguest

        <div class="article__info">
            <p class="article__desc">
                {{ $item->desc }}
            </p>
            @guest
                <a href="{{ route('login') }}" class="message">Авторизуйтесь</a>
            @else
                <a href="{{ route('news.show', [$item->slug, $item]) }}" class="continue">Подробнее...</a>
            @endguest
        </div>

    </div>
</div>

