
<?php $__env->startSection('content'); ?>
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Fatura Güncelle</h3>
        </div>
        <div class="card-toolbar">
            <a href="<?php echo e(route('product-create', $bill->id)); ?>" class="btn btn-primary font-weight-bolder mr-2">
                Faturaya Yeni Ürün Ekle</a>
        </div>
    </div>

    <div class="card-body">
        <div class="card card-custom mb-5 flex-wrap p-5">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Fatura Bilgilerini Güncelle</h3>
                </div>
            </div>
            <form class="form repeater m-5" id="kt_form" action="<?php echo e(route('update-bill', $bill->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="company">Firma</label>
                            <select class="form-control customSearchSelect2Box" name="company">
                                <option value="" selected hidden>Seçiniz</option>
                                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($company->id); ?>" <?php echo e($bill->company_id == $company->id ? 'selected' : ''); ?>><?php echo e($company->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="billDate">Fatura Tarihi</label>
                            <input value="<?php echo e($bill->bill_date->format('Y-m-d')); ?>" type="date" name="billDate" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Fatura Tipi</label>
                            <select name="billType" class="form-control customSelect2Box">
                                <option selected disabled hidden>Seçiniz</option>
                                <option value="1" <?php echo e($bill->bill_type == 1 ? 'selected' : 'disabled'); ?>>Nakit</option>
                                <option value="2" <?php echo e($bill->bill_type == 2 ? 'selected' : 'disabled'); ?>>Vadeli</option>
                            </select>
                        </div>
                        <input type="hidden" name="input_totalAmount" id="input_totalAmount" value="<?php echo e($bill->total_amount); ?>">
                        <input type="hidden" name="input_totalDiscount" id="input_totalDiscount" value="<?php echo e($bill->total_discount_inc_amount); ?>">
                        <input type="hidden" name="input_totalVAT" id="input_totalVAT" value="<?php echo e($bill->total_vat_amount); ?>">
                        <input type="hidden" name="input_totalAmountWithTaxes" id="input_totalAmountWithTaxes" value="<?php echo e($bill->total_amount_with_taxes); ?>">
                        <input type="hidden" name="input_paidAmount" id="input_paidAmount" value="<?php echo e($bill->total_paid_amount); ?>">
                    </div>
                    <div class="col-6 mt-5">
                        <tbody>
                            <table class="table borderless mt-3">
                                <tr>
                                    <th scope="row">Mal Hizmet Toplam Tutarı</th>
                                    <td class="text-right py-3"><span id="totalAmount"><?php echo number_format($bill->total_amount,  2, ',', '.') . ' TL'; ?></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Toplam İskonto</th>
                                    <td class="text-right py-3"><span id="totalDiscount"><?php echo number_format($bill->total_discount_inc_amount,  2, ',', '.') . ' TL'; ?></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Hesaplanan KDV</th>
                                    <td class="text-right py-3"><span id="totalVAT"><?php echo number_format($bill->total_vat_amount,  2, ',', '.') . ' TL'; ?></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Vergiler Dahil Toplam Tutar</th>
                                    <td class="text-right py-3"><span id="totalAmountWithTaxes"><?php echo number_format($bill->total_amount_with_taxes,  2, ',', '.') . ' TL'; ?></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Ödenecek Tutar</th>
                                    <td class="text-right py-3"><span id="paidAmount"><?php echo number_format($bill->total_paid_amount,  2, ',', '.') . ' TL'; ?></span></td>
                                </tr>
                            </table>
                        </tbody>
                    </div>
                </div>
                <div class="float-right mb-5">
                    <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
                </div>
            </form>
        </div>

        <div class="card card-custom mb-5 flex-wrap p-5 my-5">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Fatura Kalemlerini Güncelle</h3>
                </div>
            </div>
            <div class="my-5 m-5">
                <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
                    <table id="place" class="table-stack datatable-table">
                        <thead class="datatable-head">
                            <tr class="datatable-row">
                                <th width="13%" class="datatable-cell datatable-toggle-detail">Mal Hizmet</th>
                                <th width="13%" class="datatable-cell datatable-toggle-detail">Miktar</th>
                                <th width="13%" class="datatable-cell datatable-toggle-detail">Birim Fiyat</th>
                                <th width="13%" class="datatable-cell datatable-toggle-detail">İskonto Tutarı</th>
                                <th width="13%" class="datatable-cell datatable-toggle-detail">İskonto Nedeni</th>
                                <th width="13%" class="datatable-cell datatable-toggle-detail">KDV Tutarı</th>
                                <th width="13%" class="datatable-cell datatable-toggle-detail">Toplam Tutar</th>
                                <th width="13%" class="datatable-cell datatable-toggle-detail">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody class="datatable-body">
                            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="datatable-row">
                                <td width="13%" class="datatable-cell" data-label="Mal Hizmet"><?php echo e($product->name); ?></td>
                                <td width="13%" class="datatable-cell" data-label="Miktar"><?php echo e($product->quantity); ?><?php echo e(' '); ?><?php echo e($product->quantity_type); ?></td>
                                <td width="13%" class="datatable-cell" data-label="Birim Fiyat"><?php echo number_format($product->unit_price,  2, ',', '.') . ' TL'; ?></td>
                                <td width="13%" class="datatable-cell" data-label="İskonto Tutarı"><?php echo number_format($product->discount_inc_amount,  2, ',', '.') . ' TL'; ?></td>
                                <td width="13%" class="datatable-cell" data-label="İskonto Nedeni"><?php echo e($product->reasonfor_discount_inc); ?></td>
                                <td width="13%" class="datatable-cell" data-label="KDV Tutarı"><?php echo number_format($product->vat_amount,  2, ',', '.') . ' TL'; ?></td>
                                <td width="13%" class="datatable-cell" data-label="Toplam Tutar"><?php echo number_format($product->total_amount,  2, ',', '.') . ' TL'; ?></td>
                                <form action="<?php echo e(route('product-destroy', [$product->id, $bill->id])); ?>" id="deleteForm-<?php echo e($product->id); ?>" method="post" class="hidden">
                                    <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                </form>
                                <td width="13%" class="datatable-cell" data-label="İşlemler">
                                    <span>
                                        <a href="<?php echo e(route('product-edit', [$product->id, $bill->id])); ?>" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" title="Güncelle">
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

                                        <a onclick="sure(this.id);" id="<?php echo e($product->id); ?>" class="btn btn-sm btn-light btn-text-primary btn-icon" title="Sil">
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
                                    <script>
                                        function sure(id) {
                                            Swal.fire({
                                                title: "Ürünü silmek istediğinize emin misiniz?",
                                                text: "Bu işlemi geri alamayacaksınız.",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                cancelButtonText: "İptal",
                                                confirmButtonText: "Evet, sil"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    document.forms['deleteForm-' + id].submit();
                                                }
                                            })
                                        }
                                    </script>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/bill/edit.blade.php ENDPATH**/ ?>