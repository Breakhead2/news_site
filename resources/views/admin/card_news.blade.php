<div class="article__item">
    <form class="tools" method="post" action="{{ route('admin.news.destroy', $item) }}">
        @csrf
        @method('delete')
        <a href="{{ route('admin.news.edit', $item) }}" title="Редактировать" class="tool"><i class="fa-sharp fa-solid fa-pencil"></i></a>
        <button type="submit" title="Удалить" class="tool"><i class="fa-regular fa-trash-can"></i></button>
    </form>
    <div class="up">
        <a href="{{ route('news.show', [$item->slug, $item]) }}" class="article__item__link">{{ $item->title }}</a>
        <div class="under_up">
            <p class="date_of_post">Опубликовано: <span class="date">{{ $item->created_at }}</span></p>
            <p class="category">Категория: <a href="{{ route('admin.news.show', $item->slug) }}" class="category_name">{{ $item->name }}</a></p>
        </div>
    </div>

    <div class="article">
        <a href="{{ route('news.show', [$item->slug, $item]) }}" class="img__container">
            @if($item->image == 'preview.jpg')
                <img src="/storage/images/articles/{{ $item->image }}" alt="preview">
            @else
                <img src="/storage/images/articles/{{ $item->id }}/{{ $item->image }}" alt="preview">
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


