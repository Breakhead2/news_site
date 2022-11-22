@extends('layouts.admin')

@section('content')
    <div class="create">
        <form action="{{ isset($news) ? route('admin.update', $news) : route('admin.create') }}" class="form__create" method="POST">
            @csrf

            <div class="form__group">
                <label for="news_title">
                    Заголовок
                </label>
                <input autofocus="autofocus" value="{{ isset($news) ? $news->title : '' }}" type="text" name="title" required="required" placeholder="Заголовок">
            </div>

            <div class="form__group">
                <label for="category">
                    Категория
                </label>
                <select  name="category_id" id="category">
                    @forelse($categories as $category)
                        @if(isset($news))
                            <option {{ $news->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @empty
                        <option value="0">Нет категорий</option>
                    @endforelse
                </select>
            </div>

            <div class="form__group">
                <label for="desc">
                    Краткое описание
                </label>
                <textarea class="inform desc" name="desc" required="required">{{ isset($news) ? $news->desc : '' }} </textarea>
            </div>

            <div class="form__group">
                <label for="inform">
                    Текст
                </label>
                <textarea class="inform"  name="inform" required="required">{{ isset($news) ? $news->inform : '' }}</textarea>
            </div>

            <div class="form__check">
                @if(isset($news))
                    <input class="form__check__input" name="isPrivate" type="checkbox" id="isPrivate" {{ $news->isPrivate ? 'checked' : '' }} value="1">
                @else
                    <input class="form__check__input" name="isPrivate" type="checkbox" id="isPrivate" value="1">
                @endif
                <label class="form__check__label" for="isPrivate">
                    Приватная
                </label>
            </div>

            <div class="form__submit">
                <button type="submit" class="form__submit__btn">{{ isset($news) ? 'Обновить' : 'Опубликовать' }}</button>
            </div>
        </form>
    </div>
@endsection
