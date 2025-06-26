@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <h1>Добро пожаловать, {{ Auth::user()->name }}!</h1>

    <p>Здесь вы можете управлять своими подписками и получать уведомления.</p>

    <div style="margin-top: 30px;">
        <h2>Что вы можете сделать:</h2>
        <ul style="line-height: 1.8;">
            <li>📄 <strong>Профиль</strong> — обновите свои данные</li>
            <li>🧾 <strong>Мои подписки</strong> — просматривайте, добавляйте и удаляйте подписки</li>
            <li>🔔 <strong>Уведомления</strong> — читайте последние уведомления о действиях</li>
        </ul>
    </div>

    <div style="margin-top: 40px;">
        <a href="{{ route('profile.subscriptions') }}" style="display: inline-block; padding: 10px 20px; background: #007bff; color: white; border-radius: 4px;">
            Перейти к подпискам
        </a>
    </div>
@endsection
