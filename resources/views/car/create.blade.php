<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить машину</title>
</head>
<body>
@if(auth()->check())
    <a href="{{route('home')}}">На главную</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Добавление машины</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{route('cars.store')}}" enctype="multipart/form-data">
            @csrf
            <div>
                <div>
                    <label>Название:</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Введите название">
                </div>
                <br>
                <div>
                    <label>Номерной знак:</label>
                    <input type="text" name="number" class="form-control" id="number" placeholder="Введите номер">
                </div>
                <br>
                <div>
                    <label for="user">Пользователи</label>
                    <select name="user" id="user">
                        @foreach($users as $k => $v)
                            <option value="{{$k}}">{{$v}}</option>
                        @endforeach
                    </select>
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
            </div>
            <br>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
@endif
</body>
</html>
