@extends('layouts.app')

@section('content')
    <div class="login">
        <h3 class="article__item__heading" style="text-align: center">Восстановление пароля</h3>
        <form method="POST" action="{{ route('password.email') }}" class="form__login">
            @csrf
            <div class="form__group">
                <label for="password">
                    E-mail
                </label>
                <input type="password" name="password" required placeholder="E-mail" value="{{ old('email') }}">
                @error('email')
                    <span class="error">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form__submit">
                <button type="submit" class="form__submit__btn">Отправить пароль</button>
            </div>
        </form>
    </div>
@endsection
