<?php $__env->startSection('title'); ?> Обновление статьи <?php $__env->stopSection(); ?>


<?php $__env->startSection('body-container'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.cleditor.css')); ?>">

    <div class="container-fluid">


        <div class="container">
            <form enctype="multipart/form-data" action="<?php echo e(route('admin-update-post-success')); ?>" method="post" class="img-thumbnail">
                <input type="hidden" value="<?php echo e($query->id); ?>" name="id">
                <input type="hidden" value="<?php echo e($query->general_image); ?>" name="lastImage">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <h2>Обновление статьи</h2>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Заглавие</label>
                    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Введите заглавие" value="<?php echo e($query->title); ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Категория</label>
                    <select name="category" autocomplete="<?php echo e($query->category); ?>">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($category->name == $query->category): ?> selected <?php endif; ?> value="<?php echo e($category->name); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Изображение "лого"</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <textarea id="input" name="input"><?php echo e($query->post_query); ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>


        <br>
    </div>


    <script src="<?php echo e(asset('js/jquery.cleditor.js')); ?>"></script>
    <script>
        $(document).ready(function () { $("#input").cleditor(); });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.example', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alex\Documents\Projects\a1excode\resources\views/admin/adminUpdate.blade.php ENDPATH**/ ?>