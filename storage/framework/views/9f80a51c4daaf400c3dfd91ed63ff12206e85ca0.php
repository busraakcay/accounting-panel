<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-body">
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-bold nav-tabs-line" wire:ignore.self>
                <li class="nav-item" wire:ignore.self>
                    <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_2" wire:ignore.self>Gelir Türleri</a>
                </li>
                <li class="nav-item" wire:ignore.self>
                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_2" wire:ignore.self>Gider Türleri</a>
                </li>
            </ul>
        </div>
        <div class="tab-content" wire:ignore.self>
            <div class="tab-pane fade active show" id="kt_tab_pane_1_2" role="tabpanel" wire:ignore.self>
                <div class="card-body">
                    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
                        <table id="place" class="table-stack datatable-table">
                            <thead class="datatable-head">
                                <tr class="datatable-row">
                                    <th width="70%" class="datatable-cell datatable-toggle-detail">Ad</th>
                                    <th width="30%" class="datatable-cell datatable-toggle-detail">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody class="datatable-body">
                                <?php $__empty_1 = true; $__currentLoopData = $incomeTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incomeType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="datatable-row">
                                    <td width="70%" class="datatable-cell" data-label="Ad"><?php echo e($incomeType->name); ?></td>
                                    <td width="30%" class="datatable-cell" data-label="İşlemler">
                                        <span>
                                            <a wire:click="OpenEditBillTypeModal(<?php echo e($incomeType->id); ?>, <?php echo e('1'); ?>)" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" title="Güncelle">
                                                <span class="svg-icon svg-icon-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a wire:click="deleteConfirm(<?php echo e($incomeType->id); ?>, <?php echo e('1'); ?>)" class="btn btn-sm btn-light btn-text-primary btn-icon" title="Sil">
                                                <span class="svg-icon svg-icon-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr class="datatable-row">
                                    <td width="100%" class="text-left datatable-cell">
                                        <h6><i>Herhangi bir kayıt bulunamadı.</i></h6>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="kt_tab_pane_3_2" role="tabpanel" wire:ignore.self>
                <div class="card-body">
                    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
                        <table id="place" class="table-stack datatable-table">
                            <thead class="datatable-head">
                                <tr class="datatable-row">
                                    <th width="70%" class="datatable-cell datatable-toggle-detail">Ad</th>
                                    <th width="30%" class="datatable-cell datatable-toggle-detail">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody class="datatable-body">
                                <?php $__empty_1 = true; $__currentLoopData = $expenseTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expenseTypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="datatable-row">
                                    <td width="70%" class="datatable-cell" data-label="Ad"><?php echo e($expenseTypes->name); ?></td>
                                    <td width="30%" class="datatable-cell" data-label="İşlemler">
                                        <?php if($expenseTypes->id != 1): ?>
                                        <span>
                                            <a wire:click="OpenEditBillTypeModal(<?php echo e($expenseTypes->id); ?>, <?php echo e('2'); ?>)" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" title="Güncelle">
                                                <span class="svg-icon svg-icon-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a wire:click="deleteConfirm(<?php echo e($expenseTypes->id); ?>, <?php echo e('2'); ?>)" class="btn btn-sm btn-light btn-text-primary btn-icon" title="Sil">
                                                <span class="svg-icon svg-icon-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                        </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr class="datatable-row">
                                    <td width="100%" class="text-left datatable-cell">
                                        <h6><i>Herhangi bir kayıt bulunamadı.</i></h6>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('modals.bill-type-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<script>
    window.addEventListener('OpenEditBillTypeModal', function(event) {
        $('.editBillType').find('span').html('');
        $('.editBillType').modal('show');
    });
    window.addEventListener('CloseEditBillTypeModal', function(event) {
        $('.editBillType').find('span').html('');
        $('.editBillType').find('form')[0].reset();
        $('.editBillType').modal('hide');
    });

    window.addEventListener('swal:confirm', function(e) {
        Swal.fire(e.detail).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('delete', e.detail.id, e.detail.type);
            }
        });
    })

    window.addEventListener('swal:deleted', function(e) {
        Swal.fire(e.detail)
    })

    window.addEventListener('swal:deleteError', function(e) {
        Swal.fire(e.detail)
    })
</script><?php /**PATH C:\xampp\htdocs\boltat\resources\views/livewire/bill-type-table.blade.php ENDPATH**/ ?>