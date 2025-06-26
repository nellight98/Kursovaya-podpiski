@extends('layouts.app')

@section('content')
<h2>Мои подписки</h2>
<a href="{{ route('subscriptions.create') }}">Оформить новую подписку</a>

<table>
    <tr>
        <th>Тариф</th>
        <th>Начало</th>
        <th>Конец</th>
        <th>Статус</th>
        <th></th>
    </tr>
    @foreach($subscriptions as $sub)
    <tr>
        <td>{{ $sub->tariff->name }}</td>
        <td>{{ $sub->start_date }}</td>
        <td>{{ $sub->end_date }}</td>
        <td>{{ $sub->status }}</td>
        <td>
            <form method="POST" action="{{ route('subscriptions.destroy', $sub) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Удалить</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
