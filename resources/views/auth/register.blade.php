@extends('layouts.app')

@section('content')
    <div class="container login">
        <form action="#" class="form__login" method="POST">
            <div class="form__group">
                <label for="user">
                    Имя и фамилия
                </label>
                <input autofocus="autofocus" type="text" name="fio" required="required" placeholder="Имя и фамилия">
            </div>
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
            <div class="form__submit">
                <button type="submit" class="form__submit__btn">Регистрация</button>
            </div>
        </form>
    </div>
@endsection
