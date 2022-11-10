<div class="card-body">

    <div class="row">
        <div class="form-group col-6">
            <label for="startDate">Başlangıç Tarihi Seç</label>
            <input type="date"wire:model.debounce.300ms="startDate" class="form-control"/>
        </div>
        <div class="form-group col-6">
            <label for="finishDate">Bitiş Tarihi Seç</label>
            <input type="date"wire:model.debounce.300ms="finishDate" class="form-control"/>
        </div>
    </div>
    <div class="row">
        <div class="dropdown bootstrap-select col-6">
            <div class="form-group">
                <select class="form-control" wire:model="orderByCompany">
                    <option value="" selected>Tüm Firmalar</option>
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="dropdown bootstrap-select col-6">
            <div class="form-group">
                <select class="form-control" wire:model="orderByBillType">
                    <option value="" selected>Tüm Fatura Türleri</option>
                    <option value="1">Nakit</option>
                    <option value="2">Vadeli</option>
                </select>
            </div>
        </div>
    </div>
    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
        <table id="place" class="table-stack datatable-table">
            <thead class="datatable-head">
                <tr class="datatable-row">
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Firma</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Tarih</th>

                    <th width="11%" class="datatable-cell datatable-toggle-detail">Fatura Tipi</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Toplam Tutar</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">İşlemler</th>
                </tr>
            </thead>
            <tbody class="datatable-body">
                <?php $__empty_1 = true; $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="datatable-row">

                    <td width="11%" class="datatable-cell" data-label="Firma"><?php echo e(Str::limit($bill->company->name, 25, "...")); ?></td>
                    <td width="11%" class="datatable-cell" data-label="Tarih"><?php echo e($bill->bill_date->format('d.m.Y')); ?></td>
                    <td width="11%" class="datatable-cell" data-label="Fatura Tipi"><?php echo e($bill->bill_type == 1 ? 'Nakit' : 'Vadeli'); ?></td>

                    <td width="11%" class="datatable-cell" data-label="Toplam Tutar"><?php echo number_format($bill->total_amount,  2, ',', '.') . ' TL'; ?></td>
                    <td width="11%" class="datatable-cell" data-label="İşlemler">
                        <span>
                            <a wire:click="OpenBillViewModal(<?php echo e($bill->id); ?>)" class="btn btn-sm btn-light btn-text-primary btn-icon" title="Görüntüle">
                                <span class="svg-icon svg-icon-secondary svg-icon-2x">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Map/Position.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M19,11 L21,11 C21.5522847,11 22,11.4477153 22,12 C22,12.5522847 21.5522847,13 21,13 L19,13 C18.4477153,13 18,12.5522847 18,12 C18,11.4477153 18.4477153,11 19,11 Z M3,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L3,13 C2.44771525,13 2,12.5522847 2,12 C2,11.4477153 2.44771525,11 3,11 Z M12,2 C12.5522847,2 13,2.44771525 13,3 L13,5 C13,5.55228475 12.5522847,6 12,6 C11.4477153,6 11,5.55228475 11,5 L11,3 C11,2.44771525 11.4477153,2 12,2 Z M12,18 C12.5522847,18 13,18.4477153 13,19 L13,21 C13,21.5522847 12.5522847,22 12,22 C11.4477153,22 11,21.5522847 11,21 L11,19 C11,18.4477153 11.4477153,18 12,18 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="2" />
                                            <path d="M12,17 C14.7614237,17 17,14.7614237 17,12 C17,9.23857625 14.7614237,7 12,7 C9.23857625,7 7,9.23857625 7,12 C7,14.7614237 9.23857625,17 12,17 Z M12,19 C8.13400675,19 5,15.8659932 5,12 C5,8.13400675 8.13400675,5 12,5 C15.8659932,5 19,8.13400675 19,12 C19,15.8659932 15.8659932,19 12,19 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </a>
                            <a href="<?php echo e(route('edit-bill', $bill->id)); ?>" class="btn btn-sm btn-light btn-text-primary btn-icon" title="Güncelle">
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
                            <a wire:click="deleteConfirm(<?php echo e($bill->id); ?>)" class="btn btn-sm btn-light btn-text-primary btn-icon" title="Sil">
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
        <div class='container mt-5'>
            <span class='d-flex justify-content-center'><?php echo e($bills->links()); ?></span>
        </div>
    </div>
    <?php echo $__env->make('modals.bill-view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<script>
    window.addEventListener('OpenBillViewModal', function(event) {
        $('.billView').modal('show');
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
</script><?php /**PATH C:\xampp\htdocs\boltat\resources\views/livewire/bill-table.blade.php ENDPATH**/ ?>