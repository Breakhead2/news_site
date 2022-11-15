@extends('layouts.app')

@section('content')
    <div class="login">
        <form action="#" class="form__login" method="POST">
            <div class="form__group">
                <label for="user_email">
                    Email
                </label>
                <input autofocus="autofocus" type="email" name="email" required="required" placeholder="Email">
            </div>
            <div class="form__group">
                <label for="password">
                    Пароль
                </label>
                <input type="password" name="password" required placeholder="Пароль">
            </div>
            <div class="form__check">
                <input class="form__check__input" type="checkbox" value="1" id="check">
                <label class="form__check__label" for="check">
                    Запомнить меня
                </label>
            </div>
            <div class="form__submit">
                <button type="submit" class="form__submit__btn">Войти</button>
            </div>
        </form>
    </div>
@endsection
