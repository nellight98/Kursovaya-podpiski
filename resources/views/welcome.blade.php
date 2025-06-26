@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-16 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Добро пожаловать, {{ Auth::user()->name }}!</h1>
        <p class="text-lg text-gray-600 mb-6">
            Вы можете управлять своими подписками через меню.
        </p>

        <div class="mt-8 space-x-4">
            <a href="{{ route('profile.subscriptions') }}" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 transition">
                Мои подписки
            </a>
            <a href="{{ route('notifications.index') }}" class="bg-gray-200 text-gray-800 px-6 py-3 rounded hover:bg-gray-300 transition">
                Уведомления
            </a>
        </div>
    </div>
@endsection
