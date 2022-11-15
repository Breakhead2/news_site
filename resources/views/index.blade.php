@extends('layouts.app')

@section('content')
    <h2 class="heading"> Последние новости</h2>
    <div class="articles__box">

{{--        Пока нет БД условно последние новости показаны так --}}
        @forelse($last_news as $item)
            @include('news.card_news')
        @empty
            <p class="empty__news">Нет новостей</p>
        @endforelse

    </div>
@endsection

@section($add)
    <section class="want_more">
        <a href="{{ route('news.index') }}" class="want_more__link">Все новости</a>
    </section>
@endsection



