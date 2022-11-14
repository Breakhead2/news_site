<nav class="menu">
    <div class="left">
        <a href="{{ route('index') }}" class="menu__link">Главная страница</a>
        <a href="{{ route('news.index') }}" class="menu__link">Новости</a>
        <a href="{{ route('admin.create') }}" class="menu__link">Добавить новость</a>
        <a href="{{ route('admin.downloadImage') }}" class="menu__link">Скачать изображение</a>
        <a href="{{ route('admin.downloadText') }}" class="menu__link">Скачать текст</a>
    </div>
    <div class="right">
        <a href="{{ route('login') }}" class="menu__link">Войти</a>
        <a href="{{ route('register') }}" class="menu__link">Регистрация</a>
    </div>
</nav>
