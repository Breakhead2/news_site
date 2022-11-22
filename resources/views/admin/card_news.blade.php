<div class="article__item">
    <div class="tools">
        <a href="{{ route('admin.edit', $item) }}" title="Редактировать" class="tool"><i class="fa-sharp fa-solid fa-pencil"></i></a>
        <a href="{{ route('admin.destroy', $item) }}" title="Удалить" class="tool"><i class="fa-regular fa-trash-can"></i></a>
    </div>
    <div class="up">
        <a href="{{ route('news.show', [$item->slug, $item]) }}" class="article__item__link">{{ $item->title }}</a>
        <div class="under_up">
            <p class="date_of_post">Опубликовано: <span class="date">{{ $item->created_at }}</span></p>
            <p class="category">Категория: <a href="{{ route('admin.category', $item->slug) }}" class="category_name">{{ $item->name }}</a></p>
        </div>
    </div>

    <div class="article">
        <a href="{{ route('news.show', [$item->slug, $item]) }}" class="img__container">
                <img src="/storage/images/{{ $item->image }}" alt="preview">
        </a>
        <div class="article__info">
            <p class="article__desc">
                {{ $item->desc }}
            </p>
            <a href="{{ route('news.show', [$item->slug, $item]) }}" class="continue">Подробнее...</a>
        </div>
    </div>
</div>


