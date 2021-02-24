<?php $__env->startSection('title'); ?> <?php echo e($searchQuery); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('body-container'); ?>

    <br>

    <form action="<?php echo e(route('search-page')); ?>" method="get" class="form-check">
        <input type="search" name="search_query" placeholder="Поиск..." class="form-control w-25" value="<?php echo e($searchQuery); ?>">
        <br>
        <button type="submit" class="btn btn-success">Искать</button>
    </form>

    <br>

    <div class="img-thumbnail font-weight-light">
        <p class="h2">
            <b>Запрос:</b> <?php echo e($searchQuery); ?>

        </p>
    </div>

    <div class="row">


        <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


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

    <div class="container">
        <?php echo e($query->appends(['id' => Illuminate\Support\Facades\Request::input('id')])->links()); ?><hr>
    </div>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.example', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alex\Documents\Projects\a1excode\resources\views/search.blade.php ENDPATH**/ ?>