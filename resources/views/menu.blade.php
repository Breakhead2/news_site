<nav class="menu">
    <div class="left">
        <a href="{{ route('index') }}" class="menu__link">Главная страница</a>
        <a href="{{ route('news.index') }}" class="menu__link">Новости</a>
        <a href="{{ route('about') }}" class="menu__link">О нас</a>
    </div>
    <div class="right">
        <a href="{{ route('admin.index') }}" class="menu__link">Админка</a>
        <a href="{{ route('login') }}" class="menu__link">Войти</a>
        <a href="{{ route('register') }}" class="menu__link">Регистрация</a>
    </div>
</nav>
