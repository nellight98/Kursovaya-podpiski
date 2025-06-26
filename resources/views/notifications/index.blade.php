@extends('layouts.app')

@section('title', 'Уведомления')

@section('content')
    <h1>Уведомления</h1>

    @if($notifications->isEmpty())
        <p>У вас нет новых уведомлений.</p>
    @else
        <ul>
            @foreach ($notifications as $notification)
                <li style="{{ $notification->read_at ? '' : 'font-weight:bold;' }}">
                    {{ $notification->data['message'] ?? 'Уведомление' }}
                    <br>
                    <small>{{ $notification->created_at->diffForHumans() }}</small>
                    @if(!$notification->read_at)
                        <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit">Отметить как прочитано</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@endsection
