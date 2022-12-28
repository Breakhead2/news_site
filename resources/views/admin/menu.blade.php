<nav class="menu">
    <div class="box">
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
                <p class="menu__link spec__item">Скачать</p>
                <ul class="sublist">
                    <li class="list__item">
                        <a href="{{ route('admin.downloadImage') }}" class="menu__link ">Изображение</a>
                    </li>
                    <li class="list__item">
                        <a href="{{ route('admin.downloadArticles') }}" class="menu__link">Cтатьи</a>
                    </li>
                </ul>
            </li>
            <li class="list__item">
                <a href="{{ route('admin.users') }}" class="menu__link">Пользователи</a>
            </li>
            <li class="list__item">
                <a href="{{ route('admin.resource.index') }}" class="menu__link">Источники</a>
            </li>
            <li class="list__item">
                <a href="{{ route('admin.parser') }}" class="menu__link">Парсер</a>
            </li>
        </ul>
    </div>

    <div class="burger-menu">
        <i id="btn_menu" class="fa-sharp fa-solid fa-bars"></i>
    </div>
</nav>
