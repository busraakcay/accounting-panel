<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Yeni Fatura Ekle
        </h3>
    </div>
    <form class="form repeater" id="kt_form" wire:submit.prevent="save" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="company">Firma</label>
                        <select class="form-control customSearchSelect2Box" wire:model="company">
                            <option value="" selected hidden>Seçiniz</option>
                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger"> <?php $__errorArgs = ['company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="billDate">Fatura Tarihi</label>
                        <input type="date" wire:model="billDate" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                        <span class="text-danger"> <?php $__errorArgs = ['billDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Fatura Tipi</label>
                        <select wire:model="billType" class="form-control customSelect2Box">
                            <option selected disabled hidden>Seçiniz</option>
                            <option value="1">Nakit</option>
                            <option value="2">Vadeli</option>
                        </select>
                        <span class="text-danger"> <?php $__errorArgs = ['billType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                </div>
                <div class="col-6">

                </div>
            </div>

            <div id="options" class="mb-5">
                <div data-repeater-list="option_group" wire:ignore>
                    <div data-repeater-item>
                        <input type="hidden" wire:model="id" id="cat-id" />
                        <div class="form-group row">
                            <div class="container card card-custom card-body m-4 p-5">
                                <div class="card-header m-0 p-0">
                                    <h3 class="card-title">
                                        Mal Hizmet Bilgileri
                                    </h3>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="productName">Mal Hizmet</label>
                                            <input value="<?php echo e(old('productName')); ?>" type="text" class="form-control" placeholder="Ürün adı" wire:model="productName">
                                            <span class="text-danger"> <?php $__errorArgs = ['productName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="unitPrice">Birim Fiyat</label>
                                            <input value="<?php echo e(old('unitPrice')); ?>" type="text" class="form-control" placeholder="Ürünün birim fiyatı" wire:model="unitPrice">
                                            <span class="text-danger"> <?php $__errorArgs = ['unitPrice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>


                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="quantity">Miktar</label>
                                            <input value="<?php echo e(old('quantity')); ?>" type="text" class="form-control" placeholder="Ürün miktarı" wire:model="quantity">
                                            <span class="text-danger"> <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="quantityType">Miktar Tipi</label>
                                            <input value="<?php echo e(old('quantityType')); ?>" type="text" class="form-control" placeholder="Ör: kg, gr, adet, vs." wire:model="quantityType">
                                            <span class="text-danger"> <?php $__errorArgs = ['quantityType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="vatRate">KDV Oranı</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">%</div>
                                                </div>
                                                <input value="<?php echo e(old('vatRate')); ?>" type="text" class="form-control" placeholder="KDV Oranı" wire:model="vatRate">
                                            </div>
                                            <span class="text-danger"> <?php $__errorArgs = ['vatRate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="vatAmount">KDV Tutarı</label>
                                            <div class="input-group">
                                                <input value="<?php echo e(old('vatAmount')); ?>" type="text" class="form-control" placeholder="KDV Tutarı" wire:model="vatAmount">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">TL</div>
                                                </div>
                                            </div>
                                            <span class="text-danger"> <?php $__errorArgs = ['vatAmount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="discountRateofInc">İskonto Oranı</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">%</div>
                                                </div>
                                                <input value="<?php echo e(old('discountRateofInc')); ?>" type="text" class="form-control" placeholder="İskonto Oranı" wire:model="discountRateofInc">
                                            </div>
                                            <span class="text-danger"> <?php $__errorArgs = ['discountRateofInc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="discountIncAmount">İskonto Tutarı</label>
                                            <div class="input-group">
                                                <input value="<?php echo e(old('discountIncAmount')); ?>" type="text" class="form-control" placeholder="İskonto Tutarı" wire:model="discountIncAmount">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">TL</div>
                                                </div>
                                            </div>
                                            <span class="text-danger"> <?php $__errorArgs = ['discountIncAmount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="reasonforDiscountInc">İskonto Nedeni</label>
                                            <input value="<?php echo e(old('reasonforDiscountInc')); ?>" type="text" class="form-control" placeholder="İskonto Nedeni" wire:model="reasonforDiscountInc">
                                            <span class="text-danger"> <?php $__errorArgs = ['reasonforDiscountInc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="otherTaxes">Diğer Vergiler</label>
                                            <input value="<?php echo e(old('otherTaxes')); ?>" type="text" class="form-control" placeholder="Diğer Vergiler" wire:model="otherTaxes">
                                            <span class="text-danger"> <?php $__errorArgs = ['otherTaxes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="totalAmount">Mal Hizmet Tutarı</label>
                                            <input value="<?php echo e(old('totalAmount')); ?>" type="text" class="form-control" placeholder="Mal Hizmet Tutarı" wire:model="totalAmount">
                                            <span class="text-danger"> <?php $__errorArgs = ['totalAmount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-3 mt-5">
                                        <div class="form-group mt-3">
                                            <a href="javascript:;" data-repeater-delete class="btn font-weight-bold btn-danger btn-icon" value="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div data-repeater-create class="btn font-weight-bold btn-warning d-inline mr-3" value="Add">
                    <i class="fas fa-plus"></i>
                    Ürün Ekle
                </div>
                <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                <button type="reset" class="btn btn-secondary">İptal</button>
            </div>
        </div>
    </form>
</div><?php /**PATH C:\xampp\htdocs\boltat\resources\views/livewire/create-bill.blade.php ENDPATH**/ ?>