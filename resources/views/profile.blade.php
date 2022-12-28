@extends('layouts.app')

@section('content')
    <div class="profile">
        <div class="profile__container">
            @if($user->profile_photo)
                <img src="/storage/images/users/{{ $user->id }}/{{ $user->profile_photo }}" alt="profile">
            @elseif($user->profile_photo_url)
                <img src="{{ $user->profile_photo_url }}" alt="profile">
            @else
                <img src="{{ asset('storage/images/users/default.png') }}" alt="profile">
            @endif
        </div>
        <div class="form__container">
            <form action="{{ isset($user) ? route('profile') : route('register') }}" class="form__login" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form__group">
                    <label for="user">
                        Имя
                    </label>
                    <input autofocus="autofocus" type="text" name="name" required="required" value="{{ old('name') ?? (isset($user) ? $user->name : '') }}" placeholder="Имя">
                    @error('name')
                    <span class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="user_email">
                        E-mail
                    </label>
                    <input type="email" name="email" placeholder="E-mail" value="{{ old('email') ?? (isset($user) ? $user->email : '') }}">
                    @error('email')
                    <span class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="image">
                        Фото профиля
                    </label>
                    <input type="file" name="profile_photo" placeholder="Фото профиля">
                    @if($errors->has('profile_photo'))
                        <span class="error">
                    @foreach($errors->get('profile_photo') as $error)
                                {{ $error }}
                            @endforeach
                </span>
                    @endif
                </div>
                <div class="form__group">
                    <label for="password">
                        {{ isset($user) ? 'Текущий пароль' : 'Пароль' }}
                    </label>
                    <input type="password" name="password" required placeholder="{{ isset($user) ? 'Текущий пароль' : 'Пароль' }}">
                    @error('password')
                    <span class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form__group">
                    <label for="password_confirmation">
                        {{ isset($user) ? 'Новый пароль' : 'Подтвердите пароль' }}
                    </label>
                    <input type="password" name="{{ isset($user) ? 'new_password' : 'password_confirmation' }}" {{ isset($user) ? '' : 'required' }} placeholder="{{ isset($user) ? 'Новый пароль' : 'Подтвердите пароль' }}" autocomplete="new-password">
                    @error('new_password')
                    <span class="error">
                            {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form__submit">
                    <button type="submit" class="form__submit__btn">{{ isset($user) ? 'Обновить' : 'Регистрация' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

