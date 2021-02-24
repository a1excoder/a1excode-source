@extends('layouts.example')

@section('title') {{ $postQuery->title }} @endsection

@section('body-container')

    <div class="container">

        <div class="row">

            <div class="col">

                <p class="h1 font-italic">
                    {{ $postQuery->title }}
                </p>

                <p class="h6 font-weight-bold">
                    {{ $postQuery->views }} просмотров | Опубликовано: {{ $postQuery->created_at }} | №{{ $postQuery->id }} | Категория: {{ $postQuery->category }}
                </p>

                <img src="{{ asset('storage').'/'.$postQuery->general_image }}" class="img-thumbnail w-75" style="max-width: 100%;" alt=""/>

                <p class="text-body">
                    {!! $postQuery->post_query !!}
                </p>

            </div>

        </div>

        <div class="comments_div">

            <div class="container my-5">

                <style>
                    .border-top {
                        border-top: 5px solid #33b5e5 !important;
                        border-top-left-radius: .25rem!important;
                        border-top-right-radius: .25rem!important;
                    }
                </style>

                <section class="text-center dark-grey-text mb-5">

                    <div class="card">
                        <div class="card-body rounded-top border-top p-5">


                            <h3 class="font-weight-bold my-4">Написать комментарий</h3>


                            <form class="mb-4 mx-md-5" action="{{ route('post-page-submit', $post_id) }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-4">


                                        <input type="text" id="name" name="name" class="form-control" placeholder="Имя">

                                    </div>
                                    <div class="col-md-6 mb-4">


                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group mb-4">
                                            <textarea class="form-control rounded" name="message" id="message" rows="3" placeholder="Сообщение"></textarea>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" id="btnSubmit" class="btn btn-info btn-md">Отправить</button>
                                        </div>

                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </section>


            </div>



            <p class="h5 font-weight-bold">
                Комментарии
            </p>


            @foreach($comments as $comment)

                <div class="media img-thumbnail border-success" style="padding: 2%;">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $comment->user_name }} | {{ $comment->created_at }}</h5>
                        <p>{{ $comment->comment_query }}</p>
                    </div>
                </div>

                <br>

            @endforeach


            {{ $comments->appends(['id' => Illuminate\Support\Facades\Request::input('id')])->links() }}
            <hr>

        </div>

    </div>

@endsection
