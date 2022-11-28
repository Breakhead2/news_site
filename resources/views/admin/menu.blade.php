<nav class="menu">
    <ul class="left">
        <a href="{{ route('admin.news.index') }}" class="menu__link">Админка</a>
        <li class="list__item">
            <p class="menu__link">Добавить</p>
            <div class="sublist">
                <a href="{{ route('admin.news.create') }}" class="menu__link sublink">Новость</a>
                <a href="{{ route('admin.category.create') }}" class="menu__link sublink">Категорию</a>
            </div>
        </li>
        <li class="list__item">
            <p href="{{ route('admin.downloadImage') }}" class="menu__link ">Скачать</p>
            <ul class="sublist">
                <li class="list__item">
                <a href="{{ route('admin.downloadImage') }}" class="menu__link ">Изображение</a>
                </li>
                <li class="list__item">
                    <a href="{{ route('admin.downloadArticles') }}" class="menu__link">Cтатьи</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="right">
        <a href="{{ route('login') }}" class="menu__link right_link">Войти</a>
    </div>
</nav>
