<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img src="<?php echo e(asset('images/app-logo.jpg')); ?>" width="30" height="30" class="d-inline-block align-top img-thumbnail rounded-circle" alt="">
        A1exCode
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="">Главная <span class="sr-only">(current)</span></a> <!-- active -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Статьи
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="dropdown-item" href="<?php echo e(route('posts-page', $category->name)); ?>"><?php echo e($category->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </li>
            <a class="nav-item nav-link" href="https://www.youtube.com/c/ALEXCODE/" target="_blank">YouTube</a>
            <a class="nav-item nav-link" href="https://github.com/a1excoder/" target="_blank">Github</a>

            <?php if(auth()->guard()->check()): ?>
                <a class="nav-item nav-link" href="<?php echo e(route('home')); ?>">Аккаунт</a>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
                <a class="nav-item nav-link" data-toggle="modal" data-target="#modalLRForm" href="#">Вход/Регистрация</a>
            <?php endif; ?>

            <a class="nav-item nav-link disabled" href="#">Софт</a>
            <a class="nav-item nav-link" data-toggle="modal" data-target="#modalSearch" href="#">Поиск</a>
        </div>
    </div>
</nav>



<?php if(auth()->guard()->guest()): ?>

    <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">

            <div class="modal-content">


                <div class="modal-c-tabs">


                    <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                                Вход</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                                Регистрация</a>
                        </li>
                    </ul>


                    <div class="tab-content">

                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">


                            <form action="<?php echo e(route('login')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="modal-body mb-1">

                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-envelope prefix"></i>
                                        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                                    </div>

                                    <div class="md-form form-sm mb-4">
                                        <i class="fas fa-lock prefix"></i>
                                        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                        <label class="form-check-label" for="remember">
                                            <?php echo e(__('Remember Me')); ?>

                                        </label>
                                    </div>

                                    <div class="text-center mt-2">
                                        <button class="btn btn-info">Войти</button>
                                    </div>

                                    <div class="text-center mt-2">
                                        <?php if(Route::has('password.request')): ?>
                                            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                                <?php echo e(__('Забыл пароль')); ?>

                                            </a>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </form>


                        </div>



                        <div class="tab-pane fade" id="panel8" role="tabpanel">


                            <div class="modal-body">

                                <form method="POST" action="<?php echo e(route('register')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-envelope prefix"></i>
                                        <input id="name" type="text" placeholder="Придумайте логин" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                                    </div>

                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-envelope prefix"></i>
                                        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Введите E-mail" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
                                    </div>

                                    <div class="md-form form-sm mb-5">
                                        <i class="fas fa-lock prefix"></i>
                                        <input id="password" type="password" placeholder="Придумайте пароль" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">
                                    </div>

                                    <div class="md-form form-sm mb-4">
                                        <i class="fas fa-lock prefix"></i>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Повторите пароль" required autocomplete="new-password">
                                    </div>

                                    <div class="text-center form-sm mt-2">
                                        <button type="submit" class="btn btn-info">Зарегистрироваться</button>
                                    </div>
                                </form>

                            </div>

                            <div class="modal-footer">
                                <div class="options text-right">
                                    <p class="pt-1"></p>
                                </div>
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

<?php endif; ?>



<div class="modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Поиск</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('search-page')); ?>" method="get">
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="search" name="search_query" id="defaultForm-email" class="form-control validate" placeholder="Поиск...">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default">Искать</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\alex\Documents\Projects\a1excode\resources\views/layouts/header.blade.php ENDPATH**/ ?>