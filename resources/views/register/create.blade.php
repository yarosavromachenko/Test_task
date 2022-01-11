<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация пользователя</title>
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
<div>
    <div>
        <h3>Регистрация пользователя</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('register.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <div>
                <label>Имя:</label>
                <input type="text" name="name" id="name" placeholder="Введите имя"
                value="{{old('name')}}">
            </div>
            <br>
            <div>
                <label>Email:</label>
                <input type="email" name="email" id="email" placeholder="Введите email"
                       value="{{old('email')}}">
            </div>
            <br>
            <div>
                <label>Пароль:</label>
                <input type="password" name="password" id="password" placeholder="Пароль">
            </div>
            <br>
            <div>
                <label>Подтверждение пароля:</label>
                <input type="password" name="password_confirmation" placeholder="Подтвердите пароль">
            </div>
            <br>
            <div class="form-group">
                <label for="thumbnail">Изображение</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <!-- /.card-body -->
        <br>
        <div >
            <button type="submit">Регистрация</button>
        </div>

        <h3><a href="{{route('login')}}">Я уже зарегистрирован</a></h3>
    </form>
</div>
</body>
</html>
