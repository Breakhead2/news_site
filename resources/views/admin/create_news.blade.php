@extends('layouts.admin')

@section('content')
    <div class="create">
        <form action="#" class="form__create" method="POST">
            <div class="form__group">
                <label for="user_email">
                    Заголовок
                </label>
                <input autofocus="autofocus" type="text" name="title" required="required" placeholder="Заголовок">
            </div>
            <div class="form__group">
                <label for="category">
                    Категория
                </label>
                <select  name="category" id="category">
                    @foreach($categories as $key => $category)
                        <option value="{{ $key }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form__group">
                <label for="inform">
                    Текст
                </label>
                <textarea name="inform" id="inform"></textarea>
            </div>
            <div class="form__submit">
                <button type="submit" class="form__submit__btn">Опубликовать</button>
            </div>
        </form>
    </div>
@endsection
