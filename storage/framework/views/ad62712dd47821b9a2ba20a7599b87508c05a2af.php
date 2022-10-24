<div class="card-body">
    <div class="row">
        <div class="col-5">
            <div class="input-icon">
                <input type="text" class="form-control" wire:model.debounce.350ms="search" placeholder="Borç Ara...">
                <span>
                    <i class="fa fa-search text-muted"></i>
                </span>
            </div>
        </div>
        <div class="dropdown bootstrap-select form-control col-3 mr-5">
            <div class="form-group">
                <select class="form-control" wire:model="orderByCompany">
                    <option value="" selected>Tüm Firmalar</option>
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="dropdown bootstrap-select form-control col-3">
            <div class="form-group">
                <select class="form-control" wire:model="filterByPaid">
                    <option value="" selected>Tüm Borçlar</option>
                    <option value="1" selected>Ödenmemiş Borçlar</option>
                    <option value="2" selected>Ödenmiş Borçlar</option>
                </select>
            </div>
        </div>
    </div>
    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
        <table id="place" class="table-stack datatable-table">
            <thead class="datatable-head">
                <tr class="datatable-row">
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Firma</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Mal Hizmet</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Fatura Tarihi</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Miktar</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Toplam Borç</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Ödenen Borç</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Kalan Borç</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">İşlemler</th>
                </tr>
            </thead>
            <tbody class="datatable-body">
                <?php $__empty_1 = true; $__currentLoopData = $debts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="datatable-row">
                    <td width="11%" class="datatable-cell" data-label="Firma"><?php echo e($bill->company->name); ?></td>
                    <td width="11%" class="datatable-cell" data-label="Mal Hizmet"><?php echo e($bill->product_name); ?></td>
                    <td width="11%" class="datatable-cell" data-label="Fatura Tarihi"><?php echo e($bill->bill_date->format('d.m.Y')); ?></td>
                    <td width="11%" class="datatable-cell" data-label="Miktar"><?php echo e($bill->quantity); ?> <?php echo e($bill->quantity_type); ?></td>
                    <td width="11%" class="datatable-cell" data-label="Toplam Borç"><?php echo number_format($bill->total_amount,  2, ',', '.') . ' TL'; ?></td>
                    <td width="11%" class="datatable-cell" data-label="Ödenen Borç"><?php echo number_format(paidDebt($bill->id),  2, ',', '.') . ' TL'; ?></td>
                    <td width="11%" class="datatable-cell" data-label="Kalan Borç"><?php echo number_format(remainDebt($bill->id),  2, ',', '.') . ' TL'; ?></td>
                    <td width="11%" class="datatable-cell" data-label="İşlemler">
                        <?php if(remainDebt($bill->id) != 0): ?>
                        <span>
                            <a wire:click="OpenEditDebtModal(<?php echo e($bill->id); ?>)" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" title="Güncelle">
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
                        </span>
                        <?php else: ?>
                        <span>
                            <span class="label font-weight-bold label-lg label-inline label-light-success">Borç yok
                            </span>
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
        <div class='container mt-5'>
            <span class='d-flex justify-content-center'><?php echo e($debts->links()); ?></span>
        </div>
    </div>
    <?php echo $__env->make('modals.debt-pay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<script>
    window.addEventListener('OpenEditDebtModal', function(event) {
        $('.editDebt').find('span').html('');
        $('.editDebt').modal('show');
    });
    window.addEventListener('CloseEditDebtModal', function(event) {
        $('.editDebt').find('span').html('');
        $('.editDebt').find('form')[0].reset();
        $('.editDebt').modal('hide');
        Swal.fire(event.detail)
    });

    window.addEventListener('swal:confirm', function(e) {
        Swal.fire(e.detail).then((result) => {
            if (result.isConfirmed) {
                window.livewire.emit('delete', e.detail.id);
            }
        });
    })

    window.addEventListener('swal:deleted', function(e) {
        Swal.fire(e.detail)
    })

    window.addEventListener('swal:deleteError', function(e) {
        Swal.fire(e.detail)
    })
</script><?php /**PATH C:\xampp\htdocs\boltat\resources\views/livewire/debt-table.blade.php ENDPATH**/ ?>