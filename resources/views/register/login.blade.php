<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация пользователя</title>
</head>
<body>
<a href="{{route('home')}}">На главную</a>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
<div>
    <div>
        <h3>Авторизация</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('login')}}">
        @csrf
        <div>
            <div>
                <label>Email:</label>
                <input type="email" name="email" id="email" placeholder="Введите email">
            </div>
            <div>
                <label>Пароль:</label>
                <input type="password" name="password" id="password" placeholder="Пароль">
            </div>
        </div>
        <!-- /.card-body -->
        <br>
        <div>
            <button type="submit">Войти</button>
        </div>

    </form>
</div>
</body>
</html>
