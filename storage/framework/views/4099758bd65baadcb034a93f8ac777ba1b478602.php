<div class="modal fade editIncome" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gelir Güncelle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="upd_incomeId">
                    <div class="form-group">
                        <label for="upd_name">Ad</label>
                        <input type="text" class="form-control" placeholder="Ad" wire:model="upd_name">
                        <span class="text-danger"> <?php $__errorArgs = ['upd_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>

                    <div class="form-group">
                        <label for="upd_amount">Toplam Tutar</label>
                        <input type="text" class="form-control" placeholder="Toplam Tutar" wire:model="upd_amount">
                        <span class="text-danger"> <?php $__errorArgs = ['upd_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>

                    <div class="form-group">
                        <label for="upd_incomeType">Tür</label>
                        <select class="form-control" wire:model="upd_incomeType">
                            <?php $__currentLoopData = $incomeTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incomeType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($incomeType->id); ?>" <?php echo e($this->upd_incomeType == $incomeType->id ? 'selected' : ''); ?>><?php echo e($incomeType->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                        <span class="text-danger"> <?php $__errorArgs = ['upd_incomeType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>

                    <div class="form-group">
                        <label for="upd_type">Açıklama</label>
                        <textarea class="form-control" rows="3" wire:model="upd_description"></textarea>
                        <span class="text-danger"> <?php $__errorArgs = ['upd_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Kaydet</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">İptal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\boltat\resources\views/modals/income/edit.blade.php ENDPATH**/ ?>