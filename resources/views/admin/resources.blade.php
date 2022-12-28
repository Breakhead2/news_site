@extends('layouts.admin')

@section('content')
    <form class="resource_form" action="{{ isset($resource) ? route('admin.resource.update', $resource) : route('admin.resource.store') }}" method="POST">
        @csrf
        @if(isset($resource)) @method('PUT') @endif
        <div class="form__group form__group_mod">
            <input autofocus="autofocus" value="{{ old('name') ?? (isset($resource) ? $resource->name : '') }}" type="text" name="name" placeholder="Имя источника">
            @if($errors->has('name'))
                <span class="error">
                        @foreach($errors->get('name') as $error)
                        {{ $error }}
                    @endforeach
                </span>
            @endif
        </div>
        <div class="form__group form__group_mod">
            <input value="{{ old('rss_url') ?? (isset($resource) ? $resource->rss_url : '') }}" type="text" name="rss_url" placeholder="RSS URL">
            @if($errors->has('rss_url'))
                <span class="error">
                        @foreach($errors->get('rss_url') as $error)
                        {{ $error }}
                    @endforeach
                </span>
            @endif
        </div>
        <div class="form__submit res_mod">
            <button type="submit" class="form__submit__btn">{{ isset($resource) ? 'Обновить' : 'Добавить' }}</button>
        </div>
    </form>
    <div class="resource_block">
        <ul class="resources__list">
            @forelse($resources as $resource)
                <li class="resource__list_item" data-id="{{ $resource->id }}">
                    <form action="{{ route('admin.resource.destroy', $resource) }}" method="POST" class="tools">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('admin.resource.edit', $resource) }}" title="Редактировать" class="tool"><i class="fa-sharp fa-solid fa-pencil"></i></a>
                        <button type="submit" title="Удалить" class="tool"><i class="fa-regular fa-trash-can"></i></button>
                    </form>
                    <div class="resource_info">
                        <p>Название: <span>{{ $resource->name }}</span></p>
                        <p>URL-RSS: <span>{{ $resource->rss_url }}</span></p>
                    </div>
                </li>
            @empty
                <li>Нет источников</li>
            @endforelse
        </ul>
        {{ $resources->links() }}
    </div>

@endsection
