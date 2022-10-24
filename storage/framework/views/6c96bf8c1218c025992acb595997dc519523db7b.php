
<?php $__env->startSection('content'); ?>

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Yeni Fatura Ekle
        </h3>
    </div>
    <form action="<?php echo e(route('store-bill')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="company">Firma</label>
                        <select class="form-control customSearchSelect2Box" name="company">
                            <option value="" selected hidden>Seçiniz</option>
                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="productName">Mal Hizmet</label>
                        <input value="<?php echo e(old('productName')); ?>" type="text" class="form-control" placeholder="Ürün adı" name="productName">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="unitPrice">Birim Fiyat</label>
                        <input value="<?php echo e(old('unitPrice')); ?>" type="text" class="form-control" placeholder="Ürünün birim fiyatı" name="unitPrice">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="billDate">Fatura Tarihi</label>
                        <input type="date" name="billDate" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="quantity">Miktar</label>
                        <input value="<?php echo e(old('quantity')); ?>" type="text" class="form-control" placeholder="Ürün miktarı" name="quantity">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="quantityType">Miktar Tipi</label>
                        <input value="<?php echo e(old('quantityType')); ?>" type="text" class="form-control" placeholder="Ör: kg, gr, adet, vs." name="quantityType">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="vatRate">KDV Oranı</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                            </div>
                            <input value="<?php echo e(old('vatRate')); ?>" type="text" class="form-control" placeholder="KDV Oranı" name="vatRate">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="vatAmount">KDV Tutarı</label>
                        <div class="input-group">
                            <input value="<?php echo e(old('vatAmount')); ?>" type="text" class="form-control" placeholder="KDV Tutarı" name="vatAmount">
                            <div class="input-group-prepend">
                                <div class="input-group-text">TL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="discountRateofInc">İskonto Oranı</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                            </div>
                            <input value="<?php echo e(old('discountRateofInc')); ?>" type="text" class="form-control" placeholder="İskonto Oranı" name="discountRateofInc">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="discountIncAmount">İskonto Tutarı</label>
                        <div class="input-group">
                            <input value="<?php echo e(old('discountIncAmount')); ?>" type="text" class="form-control" placeholder="İskonto Tutarı" name="discountIncAmount">
                            <div class="input-group-prepend">
                                <div class="input-group-text">TL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="reasonforDiscountInc">İskonto Nedeni</label>
                        <input value="<?php echo e(old('reasonforDiscountInc')); ?>" type="text" class="form-control" placeholder="İskonto Nedeni" name="reasonforDiscountInc">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="otherTaxes">Diğer Vergiler</label>
                        <input value="<?php echo e(old('otherTaxes')); ?>" type="text" class="form-control" placeholder="Diğer Vergiler" name="otherTaxes">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Fatura Tipi</label>
                        <select name="billType" class="form-control customSelect2Box">
                            <option selected disabled hidden>Seçiniz</option>
                            <option value="1">Nakit</option>
                            <option value="2">Vadeli</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="totalAmount">Mal Hizmet Tutarı</label>
                        <input value="<?php echo e(old('totalAmount')); ?>" type="text" class="form-control" placeholder="Mal Hizmet Tutarı" name="totalAmount">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Ekle</button>
                <button type="reset" class="btn btn-secondary">İptal</button>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/bill/create.blade.php ENDPATH**/ ?>