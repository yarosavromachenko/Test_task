<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
<div>
    <a href="{{route('home')}}">На главную</a>
    <table>
        <div><h3>Список пользователей</h3></div>
        <div>
            <a href="{{route('users.create')}}">Добавить пользователя </a>
            @if(count($users))
                <thead>
                <tr>
                    <br>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th style="width: 200px">Email</th>
                    <th>Авто</th>
                    <th>Фото</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr align="center">
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->cars->pluck('title')->join(', ')}}</td>
                        <td>
                            @if(!empty($user->thumbnail))
                                Есть
                            @else
                                Нет
                            @endif
                        </td>
                        @if(auth()->check())
                            <td>
                                <button><a href="{{route('users.edit', ['user' => $user->id])}}">Редактировать</a>
                                </button>
                            </td>
                            <td>
                                <form action="{{route('users.destroy', ['user' => $user->id])}}" method="post">
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
        <p>Пользователей пока нет</p>
    @endif

</div>


</body>
</html>
