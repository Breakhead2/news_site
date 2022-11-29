@extends('layouts.app')

@section('content')
    <div class="login">
        <form action="{{ route('login') }}" class="form__login" method="POST">
            @csrf
            <div class="form__group">
                <label for="user_email">
                    Email
                </label>
                <input autofocus="autofocus" type="email" value="admin@admin.ru" name="email" required="required" placeholder="Email">
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
                <input type="password" value="123" name="password" required placeholder="Пароль">
                @error('password')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form__check">
                <input class="form__check__input" type="checkbox" value="1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form__check__label" for="check">
                    Запомнить меня
                </label>
            </div>
            <div class="form__submit">
                <button type="submit" class="form__submit__btn">Войти</button>
            </div>

            @if (Route::has('password.request'))
                <a class="forget_pas" href="{{ route('password.request') }}">
                    Забыли пароль ?
                </a>
            @endif
        </form>
    </div>
@endsection
