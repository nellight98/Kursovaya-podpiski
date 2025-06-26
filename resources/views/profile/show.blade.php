@extends('layouts.app')

@section('title', 'Мои подписки')

@section('content')
    <h2>Мои подписки</h2>
    @foreach ($subscriptions as $subscription)
        <div style="margin-bottom: 1rem; padding: 1rem; border: 1px solid #ccc; border-radius: 6px;">
            <strong>{{ $subscription->tariff->name }}</strong><br>
            Статус: {{ $subscription->status }}<br>
            Срок: {{ $subscription->start_date }} — {{ $subscription->end_date }}
            <form method="POST" action="{{ route('subscriptions.destroy', $subscription) }}" style="margin-top: 0.5rem;">
                @csrf
                @method('DELETE')
                <button class="btn">Отменить</button>
            </form>
        </div>
    @endforeach
@endsection
