<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>

    <!-- Favicon -->
    <link type="Image/x-icon" href="/icon.ico" rel="icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <a href="{{ route('index') }}" class="logo">VOICE</a><span class="admin">admin mode</span>
                <p class="desc">
                    Новостной сайт <span>voice</span> - голос народа.
                </p>
                @section('menu')
                    @include('admin.menu')
                @show
            </div>
        </header>
        <main>

            @if (session('notice'))
                <div class="alert alert-success">
                    <div class="container">
                        <div class="alert-text">
                            {{ session('notice')['text'] }}
                            @if(isset(session('notice')['link']))
                                <a href="{{ session('notice')['link'] }}" class="alert-link">Посмотреть можно тут. </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div class="container">
                @yield('content')
            </div>
        </main>
        @section('footer')
            @include('footer')
        @show
    </div>
</div>
</body>
</html>
