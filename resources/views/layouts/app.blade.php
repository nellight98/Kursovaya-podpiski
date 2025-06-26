<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Сервис подписок')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header style="background: #f5f5f5; padding: 10px 20px; border-bottom: 1px solid #ddd;">
        <nav style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <a href="{{ route('dashboard') }}" style="text-decoration: none; color: #333; font-weight: bold;">
                    Главная
                </a>
            </div>
            <div>
                @auth
                    <a href="{{ route('profile.edit') }}" style="margin-left: 20px;">Профиль</a>
                    <a href="{{ route('profile.subscriptions') }}" style="margin-left: 20px;">Мои подписки</a>
                    <a href="{{ route('notifications.index') }}" style="margin-left: 20px;">🔔</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button style="margin-left: 20px; background: none; border: none; color: #555; cursor: pointer;">Выйти</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" style="margin-left: 20px;">Вход</a>
                    <a href="{{ route('register') }}" style="margin-left: 10px;">Регистрация</a>
                @endauth
            </div>
        </nav>
    </header>

    <main style="padding: 20px;">
        @yield('content')
    </main>

    <footer style="text-align: center; padding: 10px; border-top: 1px solid #ddd; color: #999;">
        &copy; {{ date('Y') }} Сервис управления подписками
    </footer>
</body>
</html>
