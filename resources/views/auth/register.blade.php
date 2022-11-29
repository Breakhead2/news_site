@extends('layouts.app')

@section('content')
    <div class="login">
        <form action="{{ isset($user) ? route('profile') : route('register') }}" class="form__login" method="POST">
            @csrf
            <div class="form__group">
                <label for="user">
                    Имя
                </label>
                <input autofocus="autofocus" type="text" name="name" required="required" value="{{ isset($user) ? $user->name : old('name') }}" placeholder="Имя">
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
                <input autofocus="autofocus" type="email" name="email" required="required" placeholder="E-mail" value="{{ isset($user) ? $user->email : old('email') }}">
                @error('email')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror
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
@endsection
