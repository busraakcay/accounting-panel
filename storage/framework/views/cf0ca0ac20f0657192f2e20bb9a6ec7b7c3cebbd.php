<link href="<?php echo e(asset('assets/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo e(asset('assets/sweetalert/sweetalert2.all.min.js')); ?>"></script>

<div>
    <?php if($message = Session::get('success')): ?>
      <script>
      Swal.fire({
      icon: 'success',
      title: '<?php echo e($message); ?>',
      showConfirmButton: false,
      timer: 1500
      })
      </script>
    <?php endif; ?>

    <?php if($message = Session::get('error')): ?>
    <script>
    Swal.fire({
    icon: 'error',
    title: 'HATA !',
    text: '<?php echo e($message); ?>',
    })
    </script>
    <?php endif; ?>


    <?php if($message = Session::get('warning')): ?>
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon fas fa-exclamation-triangle"></i> <?php echo e($message); ?>

    </div>
    <?php endif; ?>


    <?php if($message = Session::get('info')): ?>
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon fas fa-info"></i> <?php echo e($message); ?>

    </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon fas fa-ban"></i> Lütfen formun içindeki hataları kontrol ediniz.
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\boltat\resources\views/partials/alert.blade.php ENDPATH**/ ?>