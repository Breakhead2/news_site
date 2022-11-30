<div class="user__item">
    <div class="user__image__container">
        @if($user->profile_photo == 'default.png')
            <img src="/storage/images/users/{{ $user->profile_photo }}" alt="profile">
        @else
            <img src="/storage/images/users/{{ $user->id }}/{{ $user->profile_photo }}" alt="profile">
        @endif
    </div>
    <div class="info__block">
        <ul class="info__list">
            <li class="info__item">Имя: <span>{{ $user->name }}</span></li>
            <li class="info__item">Почта: <span>{{ $user->email }}</span></li>
            <li class="info__item">Дата регистрации: <span>{{ $user->created_at }}</span></li>
        </ul>
        <form action="{{ route('admin.users') }}" method="POST">
            @csrf
            <input type="text" name="role" hidden value="{{ $user->is_admin }}">
            <input type="text" name="id" hidden value="{{ $user->id }}">
            <button class="info__btn {{ $user->is_admin ? 'admin_btn' : 'user' }}" type="submit">{{ $user->is_admin ? 'Админ' : 'Пользователь' }}</button>
        </form>
    </div>
</div>
