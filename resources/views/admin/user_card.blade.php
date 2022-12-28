<div class="user__item" data-id="{{ $user->id }}">
    <div class="user__image__container">
        @if($user->profile_photo)
            <img src="/storage/images/users/{{ $user->id }}/{{ $user->profile_photo }}" alt="profile">
        @else
            <img src="{{ asset('storage/images/users/default.png') }}" alt="profile">
        @endif
    </div>
    <div class="info__block">
        <ul class="info__list">
            <li class="info__item">Имя: <span>{{ $user->name }}</span></li>
            <li class="info__item">Почта: <span>{{ $user->email }}</span></li>
            <li class="info__item">Дата регистрации: <span>{{ $user->created_at }}</span></li>
        </ul>
        <div class="div">
            <button id="toggle" title="Сменить роль" class="info__btn {{ $user->is_admin ? 'admin_btn' : 'user' }}" type="submit">{{ $user->is_admin ? 'Админ' : 'Пользователь' }}</button>
        </div>
    </div>
</div>
