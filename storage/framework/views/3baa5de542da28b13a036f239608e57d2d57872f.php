<?php $__env->startSection('title'); ?> A1exCode - все о программировании <?php $__env->stopSection(); ?>

<?php if(auth()->guard()->check()): ?>
    <?php if(auth()->user()->type == 'admin'): ?>

        <div class="alert alert-success"> <a href="<?php echo e(route('admin-page')); ?>"> Войти в админку </a> </div>

    <?php endif; ?>
<?php endif; ?>

<?php $__env->startSection('body-container'); ?>

    <div class="row">

            <div class="col-12">
                <div class="container my-5 py-5 z-depth-1">
                    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="view overlay z-depth-1-half">
                                    <img src="<?php echo e(asset('storage').'/'.$topPost->general_image); ?>" class="img-fluid" alt="">
                                    <a href="#">
                                        <div class="mask rgba-white-light"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h3 class="font-weight-bold"><?php echo e($topPost->title); ?></h3>
                                <p class="text-muted"><?php echo mb_substr(strip_tags($topPost->post_query), 0, 250); ?></p>
                                <a class="btn btn-success" href="<?php echo e(route('post-page', $topPost->id)); ?>" role="button">Читать</a>
                            </div>
                        </div>
                    </section>
                </div>
                <hr>
            </div>

    </div>


    <div class="row">

        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-md-6">
                <div class="container my-5 py-5 z-depth-1">
                    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="view overlay z-depth-1-half">
                                    <img src="<?php echo e(asset('storage').'/'.$post->general_image); ?>" class="img-fluid" alt="">
                                    <a href="#">
                                        <div class="mask rgba-white-light"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h3 class="font-weight-bold"><?php echo e($post->title); ?></h3>
                                <p class="text-muted"><?php echo mb_substr(strip_tags($post->post_query), 0, 170); ?></p>
                                <a class="btn btn-success" href="<?php echo e(route('post-page', $post->id)); ?>" role="button">Читать</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






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
                            url: "<?php echo e(route('index.page.message')); ?>",
                            type: 'POST',
                            cache: false,
                            data: {
                                'name': name,
                                'email': email,
                                'subject': subject,
                                'message': message,
                                '_token': "<?php echo e(csrf_token()); ?>"
                            },
                            dataType: 'text',
                            beforeSend: function () {
                                btn.addClass("disabled");
                            },
                            success: function (data) {
                                btn.removeClass("disabled");

                                $("#nameForm").val('');
                                $("#emailForm").val('');
                                $("#subjectForm").val('');
                                $("#messageForm").val('');

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



                    function getWeather() {
                        var cityName = document.getElementById("cityName").value;
                        var btn = $("#btnWeatherSubmit");
                        var weatherErrors = $("#weatherErrors");

                        var cityNameF = $("#cityNameF");
                        var cityTemperature = $("#cityTemperature");
                        var cityHumidity = $("#cityHumidity");
                        var cityDescription = $("#cityDescription");



                        $.ajax({
                            url: "<?php echo e(route('index.weather.get')); ?>",
                            type: 'POST',
                            cache: false,
                            data: {
                                'city': cityName,
                                '_token': "<?php echo e(csrf_token()); ?>"
                            },
                            dataType: 'text',
                            beforeSend: function () {
                                btn.addClass("disabled");
                            },
                            success: function (data) {
                                btn.removeClass("disabled");

                                weatherErrors.removeClass("alert-danger");
                                weatherErrors.contents().remove();


                                cityNameF.contents().remove();
                                cityNameF.append(JSON.parse(data).city);

                                cityTemperature.contents().remove();
                                cityTemperature.append(JSON.parse(data).temp);

                                cityHumidity.contents().remove();
                                cityHumidity.append(JSON.parse(data).humidity);

                                cityDescription.contents().remove();
                                cityDescription.append(JSON.parse(data).description);
                            },
                            error: function (data) {
                                btn.removeClass("disabled");

                                var errors = JSON.parse(data.responseText);

                                weatherErrors.addClass("alert");
                                weatherErrors.addClass("alert-danger");
                                weatherErrors.contents().remove();

                                for (var i = 0; i < errors.errors['length']; i++) {
                                    weatherErrors.append(errors.errors[i]+"<br>");
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


                <hr>

                <div class="card">
                    <div class="card-body rounded-top border-top p-5">

                        <h3 class="font-weight-bold my-4">Погода в твоем городе: </h3>

                        <div id="weatherErrors"></div>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <input type="text" id="cityName" class="form-control" placeholder="Ваш город">
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="btnWeatherSubmit" onclick="getWeather()" class="btn btn-info btn-md">Смотреть</button>
                                </div>

                            </div>

                            <div class="col-md-12 mb-4 text-left">
                                <br>
                                <div class="alert alert-info">
                                    <div>
                                        <p>Город: <b id="cityNameF"></b></p>
                                        <p>Температура: <b id="cityTemperature"></b><b> °C</b></p>
                                        <p>Влажность: <b id="cityHumidity"></b><b> %</b></p>
                                        <p>Описание: <b id="cityDescription"></b></p>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
                </div>

            </section>


        </div>



    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.example', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Documents\projects\a1excode-source\resources\views/index.blade.php ENDPATH**/ ?>