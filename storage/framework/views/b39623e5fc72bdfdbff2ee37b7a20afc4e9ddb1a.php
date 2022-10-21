<div class="modal fade billView">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fatura Görüntüle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table borderless table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Firma</th>
                            <td><?php echo e($companyName); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Mal Hizmet</th>
                            <td><?php echo e($productName); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Miktar</th>
                            <td><?php echo e($quantity); ?> <?php echo e($quantityType); ?> </td>
                        </tr>
                        <tr>
                            <th scope="row">Birim Fiyat</th>
                            <td><?php echo number_format($unitPrice,  2, ',', '.') . ' TL'; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Fatura Tarihi</th>
                            <td> <?php echo e($billDate); ?> </td>
                        </tr>
                        <tr>
                            <th scope="row">Fatura Türü</th>
                            <td><?php echo e($billType == 1 ? 'Nakit' : 'Vadeli'); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">KDV Oranı</th>
                            <td> %<?php echo e($vatRate); ?> </td>
                        </tr>
                        <tr>
                            <th scope="row">KDV Tutarı</th>
                            <td><?php echo number_format($vatAmount,  2, ',', '.') . ' TL'; ?></td>
                        </tr>

                        <tr>
                            <th scope="row">İskonto Oranı</th>
                            <td> %<?php echo e($discountRateofInc); ?> </td>
                        </tr>
                        <tr>
                            <th scope="row">İskonto Tutarı</th>
                            <td><?php echo number_format($discountIncAmount,  2, ',', '.') . ' TL'; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">İskonto Nedeni</th>
                            <td> <?php echo e($reasonforDiscountInc); ?> </td>
                        </tr>
                        <tr>
                            <th scope="row">Diğer Vergiler</th>
                            <td> <?php echo e($otherTaxes); ?> </td>
                        </tr>
                        <tr>
                            <th scope="row">Mal Hizmet Tutarı</th>
                            <td> <?php echo number_format($totalAmount,  2, ',', '.') . ' TL'; ?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\boltat\resources\views/modals/bill-view.blade.php ENDPATH**/ ?>