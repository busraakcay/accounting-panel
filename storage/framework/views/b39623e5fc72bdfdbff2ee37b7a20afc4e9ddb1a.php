<?php
$products = getProducts($billId)
?>
<div class="modal fade billView">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-height: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="justify-content: center;"><?php echo e($companyName); ?></h3>
                <div class="d-block" style="text-align: center;">
                    <div>
                        <h5 class="card-label"> <?php echo e($billType == 1 ? 'Nakit' : 'Vadeli'); ?></h5>
                    </div>
                    <div>
                        <h5 class="card-label"> <?php echo e($billDate); ?></h5>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
                            <table id="place" class="table-stack datatable-table">
                                <thead class="datatable-head">
                                    <tr class="datatable-row">
                                        <th width="10%" class="datatable-cell datatable-toggle-detail">Mal Hizmet</th>
                                        <th width="10%" class="datatable-cell datatable-toggle-detail">Miktar</th>
                                        <th width="10%" class="datatable-cell datatable-toggle-detail">Birim Fiyat</th>
                                        <th width="10%" class="datatable-cell datatable-toggle-detail">İskonto Oranı</th>
                                        <th width="10%" class="datatable-cell datatable-toggle-detail">İskonto Tutarı</th>
                                        <th width="10%" class="datatable-cell datatable-toggle-detail">İskonto Nedeni</th>
                                        <th width="10%" class="datatable-cell datatable-toggle-detail">KDV Oranı</th>
                                        <th width="10%" class="datatable-cell datatable-toggle-detail">KDV Tutarı</th>
                                        <th width="10%" class="datatable-cell datatable-toggle-detail">Diğer Vergiler</th>
                                        <th width="10%" class="datatable-cell datatable-toggle-detail">Toplam Tutar</th>
                                    </tr>
                                </thead>
                                <tbody class="datatable-body">
                                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="datatable-row">
                                        <td width="10%" class="datatable-cell" data-label="Mal Hizmet"><?php echo e($product->name); ?></td>
                                        <td width="10%" class="datatable-cell" data-label="Miktar"><?php echo e($product->quantity); ?><?php echo e(' '); ?><?php echo e($product->quantity_type); ?></td>
                                        <td width="10%" class="datatable-cell" data-label="Birim Fiyat"><?php echo number_format($product->unit_price,  2, ',', '.') . ' TL'; ?></td>
                                        <td width="10%" class="datatable-cell" data-label="İskonto Oranı">%<?php echo e($product->discount_rateof_inc); ?></td>
                                        <td width="10%" class="datatable-cell" data-label="İskonto Tutarı"><?php echo number_format($product->discount_inc_amount,  2, ',', '.') . ' TL'; ?></td>
                                        <td width="10%" class="datatable-cell" data-label="İskonto Nedeni"><?php echo e($product->reasonfor_discount_inc); ?></td>
                                        <td width="10%" class="datatable-cell" data-label="KDV Oranı">%<?php echo e($product->vat_rate); ?></td>
                                        <td width="10%" class="datatable-cell" data-label="KDV Tutarı"><?php echo number_format($product->vat_amount,  2, ',', '.') . ' TL'; ?></td>
                                        <td width="10%" class="datatable-cell" data-label="Diğer Vergiler"><?php echo e(Str::limit($product->other_taxes, 15, "...")); ?></td>
                                        <td width="10%" class="datatable-cell" data-label="Toplam Tutar"><?php echo number_format($product->total_amount,  2, ',', '.') . ' TL'; ?></td>
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
                    <div class="col-5 mt-5 float-right mb-5">
                        <table class="mt-5 float-right">
                            <tbody>
                                <tr>
                                    <th class="pr-5 pt-4" scope="row">Toplam Tutar</th>
                                    <td class="pt-4 pl-5 float-right"><?php echo number_format($billTotalAmount,  2, ',', '.') . ' TL'; ?></td>
                                </tr>
                                <tr>
                                    <th class="pr-5 pt-4" scope="row">Toplam KDV Tutarı</th>
                                    <td class="pt-4 pl-5 float-right"><?php echo number_format($totalVATAmount,  2, ',', '.') . ' TL'; ?></td>
                                </tr>

                                <tr>
                                    <th class="pr-5 pt-4" scope="row">Toplam İskonto Tutarı</th>
                                    <td class="pt-4 pl-5 float-right"><?php echo number_format($totalDiscountIncAmount,  2, ',', '.') . ' TL'; ?></td>
                                </tr>

                                <tr>
                                    <th class="pr-5 pt-4" scope="row">Tüm Vergiler Dahil Tutar</th>
                                    <td class="pt-4 pl-5 float-right"><?php echo number_format($totalAmountWithTaxes,  2, ',', '.') . ' TL'; ?></td>
                                </tr>
                                <tr>
                                    <th class="pr-5 pt-4" scope="row">Ödenecek Tutar</th>
                                    <td class="pt-4 pl-5 float-right"><?php echo number_format($totalPaidAmount,  2, ',', '.') . ' TL'; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\boltat\resources\views/modals/bill-view.blade.php ENDPATH**/ ?>