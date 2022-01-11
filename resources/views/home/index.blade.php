<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1><a  href="{{route('home')}}">Главная страница</a></h1>

<br>
<ul>
    @if(auth()->check())
        <ul>
            <li>
                <h3><a  href="{{route('users.index')}}">Категория Пользователей</a></h3>
            </li>
            <li>
                <h3><a href="{{route('cars.index')}}">Категория Машин</a></h3>
            </li>
        </ul>
        <a  href="{{route('logout')}}">{{auth()->user()->name}}  Выход</a>
    @else

        <a  href="{{route('register.create')}}">Регистрация</a>
        <a  href="{{route('login.create')}}">Вход</a>
    @endif
</ul>

</body>
</html>
