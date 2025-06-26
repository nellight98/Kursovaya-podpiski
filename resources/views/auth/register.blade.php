@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <h1>Регистрация</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label for="name">Имя:</label><br>
        <input type="text" name="name" id="name" required autofocus><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Пароль:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <label for="password_confirmation">Подтвердите пароль:</label><br>
        <input type="password" name="password_confirmation" id="password_confirmation" required><br><br>

        <button type="submit">Зарегистрироваться</button>
    </form>

    <p>Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
@endsection
