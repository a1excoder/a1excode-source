

<?php $__env->startSection('title'); ?> Админ панель <?php $__env->stopSection(); ?>

<?php $__env->startSection('body-container'); ?>


    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.cleditor.css')); ?>">

    <div class="container-fluid">

        <h3 class="font-italic text-dark">Админ панель</h3>

        <div class="container">
            <form enctype="multipart/form-data" action="<?php echo e(route('admin-new-post')); ?>" method="post" class="img-thumbnail">
                <?php echo csrf_field(); ?>
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
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->name); ?>"><?php echo e($cat->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

            <form action="<?php echo e(route('admin-delete-post')); ?>" method="post" class="img-thumbnail">
                <?php echo csrf_field(); ?>
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

            <form action="<?php echo e(route('admin-update-post', ['id' => isset($_GET['id'])])); ?>" method="get" class="img-thumbnail">

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

            <form action="<?php echo e(route('admin.upload')); ?>" method="post" enctype="multipart/form-data" class="img-thumbnail">
                <?php echo csrf_field(); ?>
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

            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="alert alert-info">
                <p><b>Имя:</b> <?php echo e($message->user_name); ?> | <b>Email:</b> <?php echo e($message->email); ?> | <b>Время:</b> <?php echo e($message->created_at); ?></p>
                <h5><b>Тема:</b> <?php echo e($message->message_theme); ?></h5>
                <p><b>Сообщение:</b> <?php echo e($message->message_query); ?></p>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>

        <br>

        <div class="container img-thumbnail">

            <div class="form-group">
                <h2>Последние восемь комментариев к постам</h2>
            </div>

            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="alert alert-info">
                    <p><b>Имя:</b> <?php echo e($comment->user_name); ?> | <b>Email:</b> <?php echo e($comment->email_address); ?> | <b>Время:</b> <?php echo e($comment->created_at); ?></p>
                    <h6><b>Пост:</b> <a href="<?php echo e(route('post-page', $comment->post_id)); ?>"><?php echo e($comment->title); ?></a></h6>
                    <p><b>Комментарий:</b> <?php echo e($comment->comment_query); ?></p>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>


        <br>

        <div class="container img-thumbnail">
            <div class="form-group">
                <h2>Категории</h2>
            </div>

            <div class="alert alert-info">
                <form action="<?php echo e(route('admin.new.category')); ?>" method="post">
                    <?php echo csrf_field(); ?>
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
                <form action="<?php echo e(route('admin.delete.category')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <select name="category_name">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->name); ?>"><?php echo e($cat->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-success" value="Удалить">
                </form>
            </div>
        </div>


        <br>
    </div>

    <script src="<?php echo e(asset('js/jquery.cleditor.js')); ?>"></script>
    <script>
        $(document).ready(function () { $("#input").cleditor(); });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.example', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\a1excode-source\resources\views/admin/admin.blade.php ENDPATH**/ ?>