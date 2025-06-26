@extends('layouts.app')

@section('title', 'Мои подписки')

@section('content')
    <h1>Мои подписки</h1>

    {{-- Сообщения об успехе --}}
    @if(session('success'))
        <div style="color: green; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Форма добавления подписки --}}
    <form method="POST" action="{{ route('subscriptions.store') }}" style="margin-bottom: 2rem;">
        @csrf
        <label for="tariff_id">Выберите тариф:</label>
        <select name="tariff_id" id="tariff_id" required>
            @foreach($tariffs as $tariff)
                <option value="{{ $tariff->id }}">{{ $tariff->name }}</option>
            @endforeach
        </select>
        <button type="submit">Добавить подписку</button>
    </form>

    {{-- Таблица подписок --}}
    @if($subscriptions->isEmpty())
        <p>У вас нет активных подписок.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Тариф</th>
                    <th>Статус</th>
                    <th>Начало</th>
                    <th>Конец</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $subscription)
                    <tr>
                        <td>{{ $subscription->tariff->name }}</td>
                        <td>
                            @switch($subscription->status)
                                @case('active')
                                    Активна
                                    @break
                                @case('cancelled')
                                    Отменена
                                    @break
                                @default
                                    Неизвестно
                            @endswitch
                        </td>
                        <td>{{ \Carbon\Carbon::parse($subscription->start_date)->format('Y-m-d') }}</td>
                        <td>{{ \Carbon\Carbon::parse($subscription->end_date)->format('Y-m-d') }}</td>
                        <td>
                            <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" onsubmit="return confirm('Удалить подписку?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
