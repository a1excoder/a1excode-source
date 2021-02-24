@extends('layouts.app')

@section('title') Аккаунт - A1exCode @endsection

@section('content')

    <div class="container" style="height: 800px;">

        <div class="row">
            <div class="col">

                <p class="h3 font-weight-bold" style="padding: 1%;">
                    Привет [<i class="font-weight-light">{{ Auth::user()->name }}</i>]
                </p>
                <!-- <img src="/images/start_user_icon.jpg" class="img-thumbnail" style="width: 500px; max-width: 100%;" alt=""> -->

                <br>

                <button class="btn btn-success" data-toggle="modal" data-target="#modalEditName">Изменить имя</button>
                <hr>
                <button class="btn btn-info" data-toggle="modal" data-target="#modalEditPass">Изменить пароль</button>
                <hr>
                <button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">Удалить аккаунт</button>

                <br>
                <br>

            </div>
        </div>

    </div>





    <div class="modal fade" id="modalEditName" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Изменить имя</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.edit.name') }}" method="post">
                    @csrf
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="text" name="login" id="defaultForm-login" class="form-control validate" placeholder="Введите login" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-default">Изменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <div class="modal fade" id="modalEditPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Изменить пароль</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.edit.password') }}" method="post">
                    @csrf
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="text" name="last_pass" id="defaultForm-login" class="form-control validate" placeholder="Введите старый пароль">
                            <br>
                            <input type="password" name="new_pass" id="defaultForm-login" class="form-control validate" placeholder="Введите новый пароль">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-default">Изменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Удалить аккаунт</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.delete.account') }}" method="post">
                    @csrf
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="password" name="login" id="defaultForm-login" class="form-control validate" placeholder="Введите пароль">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-default">Удалить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
