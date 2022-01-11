<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars</title>
</head>
<body>
<div>
    <a href="{{route('home')}}">На главную</a>
    <table>
        <div><h3>Список машин</h3></div>
        <div>
            <a href="{{route('cars.create')}}">Добавить машину </a>

            @if(count($cars))
                <thead>
                <tr>
                    <br>
                    <th style="width: 10px">#</th>
                    <th>Название</th>
                    <th style="width: 200px">Номер</th>
                    <th>Владелец</th>
                    <th>Фото</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cars as $car)
                    <tr align="center">
                        <td>{{$car->id}}</td>
                        <td>{{$car->title}}</td>
                        <td>{{$car->number}}</td>
                        <td>{{$car->users->pluck('name')->join(', ')}}</td>
                        <td>
                            @if(!empty($car->thumbnail))
                                Есть
                            @else
                                Нет
                            @endif
                        </td>
                        @if(auth()->check())
                            <td>
                                <button><a href="{{route('cars.edit', ['car' => $car->id])}}">Редактировать</a></button>
                            </td>
                            <td>
                                <form action="{{route('cars.destroy', ['car' => $car->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Подтвердите удаление')">Удалить</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
        </div>
    </table>
    @else
        <p>Машин пока нет</p>
    @endif
</div>


</body>
</html>
