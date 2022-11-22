@extends('layouts.admin')

@section('content')
    <div class="news">
        <div class="categories__block">
            <ul class="categories">
                @forelse($categories as $category)
                    <li class="categories__list">
                        <div class="tools">
                            <a href="{{ route('admin.editCategory', $category) }}" title="Редактировать" class="tool"><i class="fa-sharp fa-solid fa-pencil"></i></a>
                            <a href="{{ route('admin.destroyCategory', $category) }}" title="Удалить" class="tool"><i class="fa-regular fa-trash-can"></i></a>
                        </div>
                        <a class="categories__link" href="{{ route('admin.category', $category->slug) }}">{{ $category->name }}</a>
                    </li>
                @empty
                    <li class="categories__list">
                        Нет категорий
                    </li>
                @endforelse
            </ul>
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


