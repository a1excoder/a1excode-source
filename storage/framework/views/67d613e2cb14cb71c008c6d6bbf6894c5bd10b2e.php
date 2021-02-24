<?php $__env->startSection('title'); ?> <?php echo e($postQuery->title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('body-container'); ?>

    <div class="container">

        <div class="row">

            <div class="col">

                <p class="h1 font-italic">
                    <?php echo e($postQuery->title); ?>

                </p>

                <p class="h6 font-weight-bold">
                    <?php echo e($postQuery->views); ?> просмотров | Опубликовано: <?php echo e($postQuery->created_at); ?> | №<?php echo e($postQuery->id); ?> | Категория: <?php echo e($postQuery->category); ?>

                </p>

                <img src="<?php echo e(asset('storage').'/'.$postQuery->general_image); ?>" class="img-thumbnail w-75" style="max-width: 100%;" alt=""/>

                <p class="text-body">
                    <?php echo $postQuery->post_query; ?>

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


                            <form class="mb-4 mx-md-5" action="<?php echo e(route('post-page-submit', $post_id)); ?>" method="post">
                                <?php echo csrf_field(); ?>

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


            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="media img-thumbnail border-success" style="padding: 2%;">
                    <div class="media-body">
                        <h5 class="mt-0"><?php echo e($comment->user_name); ?> | <?php echo e($comment->created_at); ?></h5>
                        <p><?php echo e($comment->comment_query); ?></p>
                    </div>
                </div>

                <br>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <?php echo e($comments->appends(['id' => Illuminate\Support\Facades\Request::input('id')])->links()); ?>

            <hr>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.example', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alex\Documents\Projects\a1excode\resources\views/article.blade.php ENDPATH**/ ?>