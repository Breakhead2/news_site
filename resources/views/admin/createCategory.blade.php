@extends('layouts.admin')

@section('content')
    <div class="create">
        <form action="{{ isset($category) ? route('admin.updateCategory', $category) : route('admin.createCategory') }}" class="form__create" method="POST">
            @csrf

            <div class="form__group">
                <label for="category name">
                    Название категории
                </label>
                <input autofocus="autofocus" value="{{ isset($category) ? $category->name : '' }}" type="text" name="name" required="required" placeholder="Название категории">
            </div>

            <div class="form__group">
                <label for="category">
                    Название слага
                </label>
                <input value="{{ isset($category) ? $category->slug : '' }}" type="text" name="slug" required="required" placeholder="Название слага">
            </div>

            <div class="form__submit">
                <button type="submit" class="form__submit__btn">{{ isset($category) ? 'Обновить' : 'Создать' }}</button>
            </div>
        </form>
    </div>
@endsection
