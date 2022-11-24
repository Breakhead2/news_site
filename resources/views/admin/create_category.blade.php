@extends('layouts.admin')

@section('content')
    <div class="create">
        <form action="{{ isset($category) ? route('admin.category.update', $category) : route('admin.category.store') }}" class="form__create" method="POST">
            @csrf
            @if(isset($category)) @method('PUT') @endif
            <div class="form__group">
                <label for="category name">
                    Название категории
                </label>
                <input autofocus="autofocus" value="{{ old('name') ?? (isset($category) ? $category->name : '') }}" type="text" name="name" placeholder="Название категории">

                @if($errors->has('name'))
                    <span class="error">
                        @foreach($errors->get('name') as $error)
                         {{ $error }}
                        @endforeach
                    </span>
                @endif

            </div>

            <div class="form__submit">
                <button type="submit" class="form__submit__btn">{{ isset($category) ? 'Обновить' : 'Добавить' }}</button>
            </div>
        </form>
    </div>
@endsection
