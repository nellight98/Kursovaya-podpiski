<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тарифы</title>
</head>
<body>
    <h1>Список тарифов</h1>
    <ul>
        @foreach($tariffs as $tariff)
            <li>
                <strong>{{ $tariff->name }}</strong> — {{ $tariff->price }} руб.<br>
                Длительность: {{ $tariff->duration_days }} дней<br>
                Категория: {{ $tariff->category->name ?? 'Без категории' }}<br>
                Описание: {{ $tariff->description ?? 'Нет описания' }}
            </li>
        @endforeach
    </ul>
</body>
</html>
