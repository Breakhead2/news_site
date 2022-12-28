@extends('layouts.admin')

@section('content')
    <div class="news">
        <div class="categories__block">
            <ul class="categories">
                @forelse($categories as $category)
                    <li class="categories__list" data-id="{{ $category->id }}">
                        <form class="tools" action="{{ route('admin.category.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('admin.category.edit', $category) }}" title="Редактировать" class="tool"><i class="fa-sharp fa-solid fa-pencil"></i></a>
                            <button data-id="{{ $category->id }}" id="remove_cat" title="Удалить" class="tool"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                        <a class="categories__link" href="{{ route('admin.news.show', $category->slug) }}">{{ $category->type }}</a>
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
                    @include('admin.card_news')
                @empty
                    <p class="empty__news">Нет новостей</p>
                @endforelse
            </div>
            {{ $news->links() }}
        </div>
    </div>
@endsection


