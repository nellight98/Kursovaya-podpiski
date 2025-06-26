@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
    <h1>Редактирование профиля</h1>

    @if(session('status') === 'profile-updated')
        <p style="color:green;">Профиль успешно обновлен.</p>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <label for="name">Имя:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required><br><br>

        <button type="submit">Сохранить</button>
    </form>

    <form method="POST" action="{{ route('profile.destroy') }}" style="margin-top:20px;">
        @csrf
        @method('DELETE')

        <label for="password">Подтвердите пароль для удаления аккаунта:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit" style="color:red;">Удалить аккаунт</button>
    </form>
@endsection
