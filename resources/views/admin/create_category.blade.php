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
                <input autofocus="autofocus" value="{{ old('type') ?? (isset($category) ? $category->type : '') }}" type="text" name="type" placeholder="Название категории">

                @if($errors->has('type'))
                    <span class="error">
                        @foreach($errors->get('type') as $error)
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
                            <option {{isset($category) ? ($category->resource_id == $resource->id ? 'selected' : '') : '' }} value="{{ $resource->id }}">{{ $resource->name }}</option>
                        @endif
                    @empty
                        <option value="0">Нет источников</option>
                    @endforelse
                </select>
                @error('resource_id')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form__submit">
                <button type="submit" class="form__submit__btn">{{ isset($category) ? 'Обновить' : 'Добавить' }}</button>
            </div>
        </form>
    </div>
@endsection
