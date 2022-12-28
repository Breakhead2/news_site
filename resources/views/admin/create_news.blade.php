@extends('layouts.admin')

@section('content')
    <div class="create">
        <form action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}" class="form__create" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($news)) @method('PUT') @endif
            <div class="form__group">
                <label for="news_title">
                    Заголовок
                </label>
                <input autofocus="autofocus" value="{{ old('title') ?? (isset($news) ? $news->title : '') }}" type="text" name="title" placeholder="Заголовок">
                @if($errors->has('title'))
                    <span class="error">
                        @foreach($errors->get('title') as $error)
                            {{ $error }}
                        @endforeach
                     </span>
                @endif
            </div>

            <div class="form__group">
                <label for="category">
                    Источник
                </label>
                <select  name="resource_id" id="category">
                    @forelse($resources as $resource)
                        @if(old('resource_id'))
                            <option {{old('resource_id') == $resource->id ? 'selected' : '' }} value="{{ $resource->id }}">{{ $resource->name }}</option>
                        @else
                            <option {{isset($news) ? ($news->resource_id == $resource->id ? 'selected' : '') : '' }} value="{{ $resource->id }}">{{ $resource->name }}</option>
                        @endif
                    @empty
                        <option value="0">Нет источников</option>
                    @endforelse
                </select>
                @error('resource_id')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form__group">
                <label for="category">
                    Категория
                </label>
                <select  name="category_id" id="category">
                    @forelse($categories as $category)
                        @if(old('category_id'))
                            <option {{old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->type }}</option>
                        @else
                            <option {{isset($news) ? $news->category_id == $category->id ? 'selected' : '' : '' }} value="{{ $category->id }}">{{ $category->type }}</option>
                        @endif
                    @empty
                        <option value="0">Нет категорий</option>
                    @endforelse
                </select>
                @error('category_id')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form__group">
                <label for="image">
                    Изображение к статье
                </label>
                <input type="file" name="image" placeholder="Изображение">
                @if($errors->has('image'))
                <span class="error">
                    @foreach($errors->get('image') as $error)
                        {{ $error }}
                    @endforeach
                </span>
                @endif
            </div>

            <div class="form__group form__group_mod">
                <label for="desc">
                    Краткое описание
                </label>
                <textarea class="inform desc" name="desc">{{ old('desc') ?? (isset($news) ? $news->desc : '') }} </textarea>
                @if($errors->has('desc'))
                    <span class="error">
                        @foreach($errors->get('desc') as $error)
                                {{ $error }}
                        @endforeach
                     </span>
                @endif
            </div>

            <div class="form__group">
                <label for="inform">
                    Текст
                </label>
                <textarea id="editor" class="inform"  name="inform">{{ old('inform') ?? (isset($news) ? $news->inform : '') }}</textarea>
                @if($errors->has('inform'))
                    <span class="error">
                        @foreach($errors->get('inform') as $error)
                                {{ $error }}
                        @endforeach
                    </span>
                @endif
                <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace( 'editor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
                </script>
            </div>

            <div class="form__check">
                @if(old('isPrivate'))
                    <input class="form__check__input" name="isPrivate" type="checkbox" id="isPrivate" {{ old('isPrivate') ? 'checked' : '' }} value="1">
                @else
                    <input class="form__check__input" name="isPrivate" type="checkbox" id="isPrivate" {{ isset($news->isPrivate) ? 'checked' : '' }} value="1">
                @endif
                    <label class="form__check__label" for="isPrivate">
                        Приватная
                    </label>
                    @error('isPrivate')
                        <span class="error">{{ $message }}</span>
                    @enderror
            </div>

            <div class="form__submit">
                <button type="submit" class="form__submit__btn">{{ isset($news) ? 'Обновить' : 'Опубликовать' }}</button>
            </div>
        </form>
    </div>
@endsection
