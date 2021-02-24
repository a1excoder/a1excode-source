@extends('layouts.example')

@section('title') Админ панель @endsection

@section('body-container')


    <link rel="stylesheet" href="{{ asset('css/jquery.cleditor.css') }}">

    <div class="container-fluid">

        <h3 class="font-italic text-dark">Админ панель</h3>

        <div class="container">
            <form enctype="multipart/form-data" action="{{ route('admin-new-post') }}" method="post" class="img-thumbnail">
                @csrf
                <div class="form-group">
                    <h2>Создание статьи</h2>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Заглавие</label>
                    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Введите заглавие">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Категория</label>
                    <select name="category">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Изображение "лого"</label>
                    <input type="file" name="image" class="form-control" >
                </div>

                <div class="form-group">
                    <textarea id="input" name="input"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>


        <br>


        <div class="container">

            <form action="{{ route('admin-delete-post') }}" method="post" class="img-thumbnail">
                @csrf
                <div class="form-group">
                    <h2>Удаление статьи</h2>
                </div>
                <input type="number" class="form-control" name="id" placeholder="Введите id статьи">
                <br>
                <input type="submit" class="btn btn-danger" value="Удалить статью">
            </form>

        </div>


        <br>


        <div class="container">

            <form action="{{ route('admin-update-post', ['id' => isset($_GET['id'])]) }}" method="get" class="img-thumbnail">

                <div class="form-group">
                    <h2>Обновление статьи</h2>
                </div>
                <input type="number" class="form-control" name="id" placeholder="Введите id статьи">
                <br>
                <input type="submit" class="btn btn-dark" value="Обновить статью">
            </form>

        </div>


        <br>



        <div class="container">

            <form action="{{ route('admin.upload') }}" method="post" enctype="multipart/form-data" class="img-thumbnail">
                @csrf
                <div class="form-group">
                    <h2>Загрузка изображений</h2>
                </div>
                <input type="file" class="form-control" name="image_i">
                <br>
                <input type="submit" class="btn btn-success" value="Загрузить">
            </form>

        </div>





        <br>
    </div>

    <script src="{{ asset('js/jquery.cleditor.js') }}"></script>
    <script>
        $(document).ready(function () { $("#input").cleditor(); });
    </script>
@endsection
