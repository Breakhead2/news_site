@extends('layouts.admin')

@section('content')
    <div class="create">
        <form action="{{ route('admin.downloadArticles') }}" class="form__create" method="POST">
            @csrf
            <div class="form__group">
                <label for="category">
                    Выберите категорию
                </label>
                <select  name="category_id" id="category">
                    @forelse($categories as $category)
                        <option {{ (old('category') == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option value="0">Нет категорий</option>
                    @endforelse
                </select>
            </div>
            <div class="form__submit">
                <button type="submit" class="form__submit__btn">Скачать</button>
            </div>
        </form>
    </div>
@endsection
