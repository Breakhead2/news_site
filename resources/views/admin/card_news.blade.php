<div class="article__item" data-id="{{ $item->id }}">
    <div class="tools">
        <a href="{{ route('admin.news.edit', $item) }}" title="Редактировать" class="tool"><i class="fa-sharp fa-solid fa-pencil"></i></a>
        <button id="remove_art" data-id="{{ $item->id }}" type="submit" title="Удалить" class="tool"><i class="fa-regular fa-trash-can"></i></button>
    </div>
    <div class="up">
        <a href="{{ route('news.show', [$item->slug, $item]) }}" class="article__item__link">{{ $item->title }}</a>
        <div class="under_up">
            <p class="date_of_post">Опубликовано: <span class="date">{{ $item->created_at }}</span></p>
            <p class="category">Категория: <a href="{{ route('admin.news.show', $item->slug) }}" class="category_name">{{ $item->type }}</a></p>
        </div>
    </div>

    <div class="article">
        <a href="{{ route('news.show', [$item->slug, $item]) }}" class="img__container">
            @if($item->image)
                <img src="/storage/images/articles/{{ $item->id }}/{{ $item->image }}" alt="preview">
            @elseif($item->image_url)
                <img src="{{ $item->image_url }}" alt="preview">
            @else
                <img src="{{ asset('storage/images/articles/default.png') }}" alt="preview">
            @endif
        </a>
        <div class="article__info">
            <p class="article__desc">
                {{ $item->desc }}
            </p>
            <a href="{{ route('news.show', [$item->slug, $item]) }}" class="continue">Подробнее...</a>
        </div>
    </div>
</div>


