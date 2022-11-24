<nav class="menu">
    <div class="left">
        <a href="{{ route('admin.news.index') }}" class="menu__link">Админка</a>
        <a href="{{ route('admin.news.create') }}" class="menu__link">Добавить новость</a>
        <a href="{{ route('admin.category.create') }}" class="menu__link">Добавить категорию</a>
        <a href="{{ route('admin.downloadImage') }}" class="menu__link">Скачать изображение</a>
        <a href="{{ route('admin.downloadArticles') }}" class="menu__link">Скачать статьи</a>
    </div>
    <div class="right">
        <a href="{{ route('login') }}" class="menu__link">Войти</a>
    </div>
</nav>
