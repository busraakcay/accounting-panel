
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xl-6">
        <div class="card card-custom bg-danger card-stretch gutter-b">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="card-title text-uppercase text-white mb-2">
                            Anlık Kâr Zarar
                        </h6>
                        <span class="h3 mb-0 text-white">
                            <?php echo e(number_format(calculateDayMoney(),  2, ',', '.')); ?> <b>₺</b>
                        </span>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-sharp fa-solid fa-calculator text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card card-custom bg-info card-stretch gutter-b">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="card-title text-uppercase text-white mb-2">
                            Kasam
                        </h6>
                        <span class="h3 mb-0 text-white">
                            <?php echo e(number_format($cashAmount,  2, ',', '.')); ?> <b>₺</b>
                        </span>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-sharp fa-solid fa-box text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <a href="<?php echo e(route('branch')); ?>">
            <div class="card card-custom bg-primary card-stretch gutter-b">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-white mb-2">
                                Şubelerim
                            </h6>
                            <span class="h3 mb-0 text-white">
                                <?php echo e($branchCount); ?>

                            </span>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-sharp fa-solid fa-code-branch text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-6">
        <a href="<?php echo e(route('company')); ?>">
            <div class="card card-custom bg-warning card-stretch gutter-b">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-white mb-2">
                                Firmalarım
                            </h6>
                            <span class="h3 mb-0 text-white">
                                <?php echo e($companyCount); ?>

                            </span>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-city text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-6">
        <a href="<?php echo e(route('bill')); ?>">
            <div class="card card-custom bg-warning card-stretch gutter-b">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-white mb-2">
                                Faturalarım
                            </h6>
                            <span class="h3 mb-0 text-white">
                                <?php echo e($billCount); ?>

                            </span>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-invoice text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-6">
        <a href="<?php echo e(route('debt')); ?>">
            <div class="card card-custom bg-danger card-stretch gutter-b">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-white mb-2">
                                Borçlarım
                            </h6>
                            <span class="h3 mb-0 text-white">
                                <?php echo e($debtCount); ?>

                            </span>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-money-bill-alt text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-6">
        <a href="<?php echo e(route('income')); ?>">
            <div class="card card-custom bg-info card-stretch gutter-b">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-white mb-2">
                                Gelirler
                            </h6>
                            <span class="h3 mb-0 text-white">
                                <?php echo e($incomeCount); ?>

                            </span>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-plus fa-solid fa-code-branch text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-6">
        <a href="<?php echo e(route('expense')); ?>">
            <div class="card card-custom bg-success card-stretch gutter-b">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-white mb-2">
                                Giderler
                            </h6>
                            <span class="h3 mb-0 text-white">
                                <?php echo e($expenseCount); ?>

                            </span>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-minus text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/dashboard/index.blade.php ENDPATH**/ ?>