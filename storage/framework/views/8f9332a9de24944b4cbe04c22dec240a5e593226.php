
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xl-3">
        <a href="<?php echo e(route('branch')); ?>">
            <div class="card card-custom bg-info card-stretch gutter-b">
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
    <div class="col-xl-3">
        <a href="<?php echo e(route('company')); ?>">
            <div class="card card-custom bg-success card-stretch gutter-b">
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
    <div class="col-xl-3">
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
    <div class="col-xl-3">
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
</div>
<div class="card card-custom gutter-b">
    <div class="card-header border-0 py-5 ribbon ribbon-clip ribbon-left">
        <div class="ribbon-target" style="top: 15px; height: 45px;">
            <span class="ribbon-inner bg-danger"></span><i class="fa fa-bomb text-white"></i>
        </div>
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark ml-5">Ödemesi Yaklaşan Borçlarım</span>
        </h3>
        <div class="card-toolbar">
            <a href="<?php echo e(route('debt')); ?>" class="btn btn-info font-weight-bolder font-size-sm">Tüm Borçları Görüntüle</a>
        </div>
    </div>
    <div class="card-body py-0">
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                <thead class="datatable-head">
                    <tr class="datatable-row">
                        <th width="12%" class="datatable-cell datatable-toggle-detail">Firma</th>
                        <th width="12%" class="datatable-cell datatable-toggle-detail">Mal Hizmet</th>
                        <th width="12%" class="datatable-cell datatable-toggle-detail">Fatura Tarihi</th>
                        <th width="12%" class="datatable-cell datatable-toggle-detail">Miktar</th>
                        <th width="12%" class="datatable-cell datatable-toggle-detail">Toplam Borç</th>
                        <th width="12%" class="datatable-cell datatable-toggle-detail">Ödenen Borç</th>
                        <th width="12%" class="datatable-cell datatable-toggle-detail">Kalan Borç</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="8">
                            <h4 class="text-muted m-5"><i>Henüz herhangi bir sipariş bulunmamaktadır</i></h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/dashboard/index.blade.php ENDPATH**/ ?>