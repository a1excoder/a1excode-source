@extends('layouts.example')

@section('title') Обновление статьи @endsection


@section('body-container')

    <link rel="stylesheet" href="{{ asset('css/jquery.cleditor.css') }}">

    <div class="container-fluid">


        <div class="container">
            <form enctype="multipart/form-data" action="{{ route('admin-update-post-success') }}" method="post" class="img-thumbnail">
                <input type="hidden" value="{{ $query->id }}" name="id">
                <input type="hidden" value="{{ $query->general_image }}" name="lastImage">
                @csrf
                <div class="form-group">
                    <h2>Обновление статьи</h2>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Заглавие</label>
                    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Введите заглавие" value="{{ $query->title }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Категория</label>
                    <select name="category" autocomplete="{{ $query->category }}">
                        @foreach($categories as $category)
                            <option @if($category->name == $query->category) selected @endif value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Изображение "лого"</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <textarea id="input" name="input">{{ $query->post_query }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>


        <br>
    </div>


    <script src="{{ asset('js/jquery.cleditor.js') }}"></script>
    <script>
        $(document).ready(function () { $("#input").cleditor(); });
    </script>
@endsection
