<div class="article__item">
    <div class="up">
        @guest
            @if($item->isPrivate)
                <h3 class="article__item__heading">{{ $item->title }}</h3>
            @else
                <a href="{{ route('news.show', [$item->slug, $item]) }}" class="article__item__link">{{ $item->title }}</a>
            @endif
        @else
            <a href="{{ route('news.show', [$item->slug, $item]) }}" class="article__item__link">{{ $item->title }}</a>
        @endguest

        <div class="under_up">
                <p class="date_of_post">Опубликовано: <span class="date">{{ $item->created_at }}</span></p>
                <p class="category">Категория: <a href="{{ route('news.category', $item->slug) }}" class="category_name">{{ $item->type }}</a></p>
        </div>
    </div>
    <div class="article">

        @guest
            @if($item->isPrivate)
            <div class="img__container">
                @if($item->image)
                    <img src="/storage/images/articles/{{ $item->id }}/{{ $item->image }}" alt="preview">
                @elseif($item->image_url)
                    <img src="{{ $item->image_url }}" alt="preview">
                @else
                    <img src="{{ asset('storage/images/articles/default.png') }}" alt="preview">
                @endif
            </div>
            @else
                <a href="{{ route('news.show', [$item->slug, $item]) }}" class="img__container">
                    @if($item->image)
                        <img src="/storage/images/articles/{{ $item->id }}/{{ $item->image }}" alt="preview">
                    @elseif($item->image_url)
                        <img src="{{ $item->image_url }}" alt="preview">
                    @else
                        <img src="{{ asset('storage/images/articles/default.png') }}" alt="preview">
                    @endif
                </a>
            @endif
        @else
            <a href="{{ route('news.show', [$item->slug, $item]) }}" class="img__container">
                @if($item->image)
                    <img src="/storage/images/articles/{{ $item->id }}/{{ $item->image }}" alt="preview">
                @elseif($item->image_url)
                    <img src="{{ $item->image_url }}" alt="preview">
                @else
                    <img src="{{ asset('storage/images/articles/default.png') }}" alt="preview">
                @endif
            </a>
        @endguest

        <div class="article__info">
            <p class="article__desc">
                {{ $item->desc }}
            </p>
            @guest
                @if($item->isPrivate)
                    <a href="{{ route('login') }}" class="message">Авторизуйтесь</a>
                @else
                    <a href="{{ route('news.show', [$item->slug, $item]) }}" class="continue">Подробнее...</a>
                @endif
            @else
                <a href="{{ route('news.show', [$item->slug, $item]) }}" class="continue">Подробнее...</a>
            @endguest
        </div>

    </div>
</div>

