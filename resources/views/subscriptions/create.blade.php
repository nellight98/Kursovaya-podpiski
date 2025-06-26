@extends('layouts.app')

@section('content')
<h2>Оформить подписку</h2>
<form method="POST" action="{{ route('subscriptions.store') }}">
    @csrf
    <label>Тариф:</label>
    <select name="tariff_id">
        @foreach($tariffs as $tariff)
            <option value="{{ $tariff->id }}">{{ $tariff->name }} — {{ $tariff->price }}₽</option>
        @endforeach
    </select>

    <label>Дата начала:</label>
    <input type="date" name="start_date" required>

    <button type="submit">Оформить</button>
</form>
@endsection
