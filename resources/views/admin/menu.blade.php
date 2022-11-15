<nav class="menu">
    <div class="left">
        <a href="{{ route('admin.index') }}" class="menu__link">Админка</a>
        <a href="{{ route('admin.create') }}" class="menu__link">Добавить новость</a>
        <a href="{{ route('admin.downloadImage') }}" class="menu__link">Скачать изображение</a>
        <a href="{{ route('admin.downloadText') }}" class="menu__link">Скачать текст</a>
    </div>
    <div class="right">
        <a href="{{ route('login') }}" class="menu__link">Войти</a>
    </div>
</nav>
