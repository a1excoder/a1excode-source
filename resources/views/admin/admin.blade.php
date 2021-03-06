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
                    <input type="file" name="image" accept="image/*" class="form-control" >
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

        <div class="container img-thumbnail">

            <div class="form-group">
                <h2>Последние шесть сообщений из формы</h2>
            </div>

            @foreach($messages as $message)

            <div class="alert alert-info">
                <p><b>Имя:</b> {{ $message->user_name }} | <b>Email:</b> {{ $message->email }} | <b>Время:</b> {{ $message->created_at }}</p>
                <h5><b>Тема:</b> {{ $message->message_theme }}</h5>
                <p><b>Сообщение:</b> {{ $message->message_query }}</p>
            </div>

            @endforeach


        </div>

        <br>

        <div class="container img-thumbnail">

            <div class="form-group">
                <h2>Последние восемь комментариев к постам</h2>
            </div>

            @foreach($comments as $comment)

                <div class="alert alert-info">
                    <p><b>Имя:</b> {{ $comment->user_name }} | <b>Email:</b> {{ $comment->email_address }} | <b>Время:</b> {{ $comment->created_at }}</p>
                    <h6><b>Пост:</b> <a href="{{ route('post-page', $comment->post_id) }}">{{ $comment->title }}</a></h6>
                    <p><b>Комментарий:</b> {{ $comment->comment_query }}</p>
                </div>

            @endforeach


        </div>


        <br>

        <div class="container img-thumbnail">
            <div class="form-group">
                <h2>Категории</h2>
            </div>

            <div class="alert alert-info">
                <form action="{{ route('admin.new.category') }}" method="post">
                    @csrf
                    <input type="text" class="form-control" name="new_category" placeholder="Введите имя новой категории">
                    <br>
                    <input type="submit" class="btn btn-success" value="Создать">
                </form>
            </div>
        </div>


        <br>

        <div class="container img-thumbnail">
            <div class="form-group">
                <h2>Удаление категорий</h2>
            </div>

            <div class="alert alert-info">
                <form action="{{ route('admin.delete.category') }}" method="post">
                    @csrf
                    <select name="category_name">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-success" value="Удалить">
                </form>
            </div>
        </div>


        <br>
    </div>

    <script src="{{ asset('js/jquery.cleditor.js') }}"></script>
    <script>
        $(document).ready(function () { $("#input").cleditor(); });
    </script>
@endsection
