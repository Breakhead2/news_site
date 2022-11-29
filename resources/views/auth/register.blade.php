@extends('layouts.app')

@section('content')
    <div class="login">
        <form action="{{ route('register') }}" class="form__login" method="POST">
            @csrf
            <div class="form__group">
                <label for="user">
                    Имя
                </label>
                <input autofocus="autofocus" type="text" name="name" required="required" value="{{ old('name') }}" placeholder="Имя">
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
                <input autofocus="autofocus" type="email" name="email" required="required" placeholder="E-mail" value="{{ old('email') }}">
                @error('email')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form__group">
                <label for="password">
                    Пароль
                </label>
                <input type="password" name="password" required placeholder="Пароль">
                @error('password')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form__group">
                <label for="password_confirmation">
                    Подтвердите пароль
                </label>
                <input type="password" name="password_confirmation" required placeholder="Подтвердите пароль" autocomplete="new-password">
                @error('new_password')
                    <span class="error">
                            {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form__submit">
                <button type="submit" class="form__submit__btn">Регистрация</button>
            </div>
        </form>
    </div>
@endsection
