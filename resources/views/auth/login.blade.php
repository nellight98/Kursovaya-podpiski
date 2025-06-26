@extends('layouts.app')

@section('title', 'Вход')

@section('content')
    <h1>Вход</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required autofocus><br><br>

        <label for="password">Пароль:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Войти</button>
    </form>

    <p>Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
@endsection
