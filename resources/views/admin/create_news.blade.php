@extends('layouts.admin')

@section('content')
    <div class="create">
        <form action="{{ route('admin.create') }}" class="form__create" method="POST">
            @csrf

            <div class="form__group">
                <label for="user_email">
                    Заголовок
                </label>
                <input autofocus="autofocus" value="{{ old('title') }}" type="text" name="title" required="required" placeholder="Заголовок">
            </div>

            <div class="form__group">
                <label for="category">
                    Категория
                </label>
                <select  name="category_id" id="category">
                    @forelse($categories as $category)
                        <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option value="0">Нет категорий</option>
                    @endforelse
                </select>
            </div>

            <div class="form__group">
                <label for="desc">
                    Краткое описание
                </label>
                <input value="{{ old('desc') }}" type="text" name="desc" required="required" placeholder="Краткое описание">
            </div>

            <div class="form__group">
                <label for="inform">
                    Текст
                </label>
                <textarea name="inform" id="inform" required="required">{{ old('inform') }}</textarea>
            </div>

            <div class="form__check">
                <input class="form__check__input" name="isPrivate" type="checkbox" id="isPrivate" {{ old('private') ? 'checked' : '' }} value="1">
                <label class="form__check__label" for="isPrivate">
                    Приватная
                </label>
            </div>

            <div class="form__submit">
                <button type="submit" class="form__submit__btn">Опубликовать</button>
            </div>
        </form>
    </div>
@endsection
