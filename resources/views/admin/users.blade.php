@extends('layouts.admin')

@section('content')
    <div class="users__block">
        <div class="users__box">
            @forelse($users as $user)
                @include('admin.user_card')
            @empty
                <p class="empty__news">Нет пользователей</p>
            @endforelse
        </div>
        {{ $users->links() }}
    </div>
@endsection
