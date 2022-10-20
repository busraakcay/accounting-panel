<div class="modal fade createBranch" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Şube Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="name">Ad</label>
                        <input type="text" class="form-control" placeholder="Ad" wire:model="name">
                        <span class="text-danger"> <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>

                    <div class="form-group">
                        <label for="amount">Nakit Miktarı</label>
                        <input type="text" class="form-control" placeholder="Nakit Miktarı" wire:model="amount">
                        <span class="text-danger"> <?php $__errorArgs = ['amount'];
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
</div><?php /**PATH C:\xampp\htdocs\boltat\resources\views/modals/branch/create.blade.php ENDPATH**/ ?>