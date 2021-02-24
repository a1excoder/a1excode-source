@extends('layouts.example')

@section('title') A1exCode - все о программировании @endsection

@auth()
    @if(auth()->user()->type == 'admin')

        <div class="alert alert-success"> <a href="{{ route('admin-page') }}"> Войти в админку </a> </div>

    @endif
@endauth

@section('body-container')

    <div class="row">

            <div class="col-12">
                <div class="container my-5 py-5 z-depth-1">
                    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="view overlay z-depth-1-half">
                                    <img src="{{ asset('storage').'/'.$topPost->general_image }}" class="img-fluid" alt="">
                                    <a href="#">
                                        <div class="mask rgba-white-light"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h3 class="font-weight-bold">{{ $topPost->title}}</h3>
                                <p class="text-muted">{!! mb_substr(strip_tags($topPost->post_query), 0, 250) !!}</p>
                                <a class="btn btn-success" href="{{ route('post-page', $topPost->id) }}" role="button">Читать</a>
                            </div>
                        </div>
                    </section>
                </div>
                <hr>
            </div>

    </div>


    <div class="row">

        @foreach($posts as $post)

            <div class="col-md-6">
                <div class="container my-5 py-5 z-depth-1">
                    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="view overlay z-depth-1-half">
                                    <img src="{{ asset('storage').'/'.$post->general_image }}" class="img-fluid" alt="">
                                    <a href="#">
                                        <div class="mask rgba-white-light"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h3 class="font-weight-bold">{{ $post->title }}</h3>
                                <p class="text-muted">{!! mb_substr(strip_tags($post->post_query), 0, 170) !!}</p>
                                <a class="btn btn-success" href="{{ route('post-page', $post->id) }}" role="button">Читать</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        @endforeach






    </div>




    <div class="container my-5">



        <section>

            <h6 class="font-weight-normal text-uppercase font-small grey-text mb-4 text-center">FAQ</h6>

            <h3 class="font-weight-bold black-text mb-4 pb-2 text-center">A1exCode - все о программировании</h3>
            <hr class="w-header">

            <p class="lead text-muted mx-auto mt-4 pt-2 mb-5 text-center">Кто я и для чего этот проект.</p>

            <div class="row text-center text-md-left">
                <div class="col-md-6 mb-4">
                    <h5 class="font-weight-normal mb-3">Меня зовут Александр</h5>
                    <p class="text-muted">Мне 16 лет и я (Почти)программист.</p>
                </div>

                <div class="col-md-6 mb-4">
                    <h5 class="font-weight-normal mb-3">Я занимаюсь программированием с 13 лет</h5>
                    <p class="text-muted">Первый язык который я выучил был HTML, да я знаю что это не язык программирования а язык разметки.</p>
                </div>

                <div class="col-md-6 mb-4">
                    <h5 class="font-weight-normal mb-3">Сейчас я занимаюсь программированием Back-end на PHP</h5>
                    <p class="text-muted">Я выбрал Back-end потому что я не дизайнер и верстка мне както не зашла, и в данный момент я занимаюсь изучением фреймворков для языка PHP.</p>
                </div>

                <div class="col-md-6 mb-4">
                    <h5 class="font-weight-normal mb-3">Почему PHP?</h5>
                    <p class="text-muted">Я выбрал PHP просто случайно, я интересовался какие языки программирования существуют и мне понравился PHP, и синтаксис у PHP очень простой и приятный.</p>
                </div>

            </div>

        </section>



        <div class="container my-5">

            <style>
                .border-top {
                    border-top: 5px solid #33b5e5 !important;
                    border-top-left-radius: .25rem!important;
                    border-top-right-radius: .25rem!important;
                }
            </style>

            <section class="text-center dark-grey-text mb-5">

                <!-- ajax script for sending form -->
                <script>

                    function sendMessage() {

                        var name = document.getElementById('nameForm').value;
                        var email = document.getElementById('emailForm').value;
                        var subject = document.getElementById('subjectForm').value;
                        var message = document.getElementById('messageForm').value;
                        var statusDiv = $("#statusDiv");

                        var btn = $("#btnSubmit");

                        $.ajax({
                            url: "{{ route('index.page.message') }}",
                            type: 'POST',
                            cache: false,
                            data: {
                                'name': name,
                                'email': email,
                                'subject': subject,
                                'message': message,
                                '_token': "{{ csrf_token() }}"
                            },
                            dataType: 'text',
                            beforeSend: function () {
                                btn.addClass("disabled");
                            },
                            success: function (data) {
                                btn.removeClass("disabled");

                                statusDiv.removeClass("alert-danger");
                                statusDiv.contents().remove();

                                statusDiv.addClass("alert-success");
                                statusDiv.append(JSON.parse(data).message);
                            },
                            error: function (data) {
                                btn.removeClass("disabled");

                                var errors = JSON.parse(data.responseText);

                                statusDiv.addClass("alert-danger");
                                statusDiv.contents().remove();

                                for (var i = 0; i < errors.errors['length']; i++) {
                                    statusDiv.append(errors.errors[i]+"<br>");
                                }

                            }
                        })
                    }

                </script>

                <div class="card">
                    <div class="card-body rounded-top border-top p-5">



                        <h3 class="font-weight-bold my-4">Связаться с нами</h3>

                        <div class="alert" id="statusDiv"></div>


                            <div class="row">

                                <div class="col-md-6 mb-4">


                                    <input type="text" id="nameForm" class="form-control" placeholder="Имя">

                                </div>
                                <div class="col-md-6 mb-4">


                                    <input type="email" id="emailForm" class="form-control" placeholder="Email">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">


                                    <input type="text" id="subjectForm" class="form-control" placeholder="Тема">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group mb-4">
                                        <textarea class="form-control rounded" id="messageForm" rows="3" placeholder="Сообщение"></textarea>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" id="btnSubmit" onclick="sendMessage()" class="btn btn-info btn-md">Отправить</button>
                                    </div>

                                </div>
                            </div>

                    </div>
                </div>

            </section>


        </div>



    </div>
    </div>

@endsection
