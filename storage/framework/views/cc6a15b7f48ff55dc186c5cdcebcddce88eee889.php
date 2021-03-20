<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Все о программировании, новости в сфере IT и многое другое" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('images/app-logo.jpg')); ?>" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <script src="<?php echo e(asset('js/jquery-3.5.1.min.js')); ?>"></script>
</head>
<body>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>


<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo session('success'); ?>

    </div>
<?php endif; ?>

<?php if(session('danger')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('danger')); ?>

    </div>
<?php endif; ?>

    <div class="container-fluid">

        <?php echo $__env->yieldContent('body-container'); ?>

    </div>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\Admin\Desktop\a1excode-source\resources\views/layouts/example.blade.php ENDPATH**/ ?>