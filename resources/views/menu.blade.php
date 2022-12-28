<nav class="menu">
    <div class="box">
        <div class="left">
            <a href="{{ route('index') }}" class="menu__link">Главная страница</a>
            <a href="{{ route('news.index') }}" class="menu__link">Новости</a>
            <a href="{{ route('about') }}" class="menu__link">О проекте</a>
        </div>
        <div class="right">

            @guest
                <a href="{{ route('login') }}" class="menu__link">Войти</a>
                <a href="{{ route('register') }}" class="menu__link">Регистрация</a>
            @else
                @if(Auth::user()->is_admin)
                    <a href="{{ route('admin.news.index') }}" class="menu__link">Админка</a>
                @endif
                <div class="list__item user_box">
                    <p class="menu__link">
                <span class="ava__container">
                @if(Auth::user()->profile_photo)
                        <img src="/storage/images/users/{{ Auth::user()->id }}/{{ Auth::user()->profile_photo }}" alt="profile">
                    @elseif(Auth::user()->profile_photo_url)
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="profile">
                    @else
                        <img src="{{ asset('storage/images/users/default.png') }}" alt="profile">
                    @endif
                </span>
                        {{ Auth::user()->name }}
                    </p>
                    <div class="sublist">
                        <div class="list__item">
                            <a href="{{ route('profile') }}" class="menu__link ">Профиль</a>
                        </div>
                        <div class="list__item">
                            <a href="{{ route('logout') }}" class="menu__link"
                               onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit()">
                                Выйти
                            </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
    <div class="burger-menu">
        <i id="btn_menu" class="fa-sharp fa-solid fa-bars"></i>
    </div>
</nav>
