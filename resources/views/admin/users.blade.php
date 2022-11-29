@extends('layouts.admin')

@section('content')
    <div class="users__block">
        <div class="users__box">
            @forelse($users as $user)
                <div class="user__item">
                    <p class="name">{{ $user->name }}</p>
                </div>
            @empty
                <p class="empty__news">Нет пользователей</p>
            @endforelse
        </div>
        {{ $users->links() }}
    </div>
@endsection
