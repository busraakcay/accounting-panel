
<?php $__env->startSection('content'); ?>

<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Yeni Fatura Ekle</h3>
        </div>
    </div>
    <form class="form repeater" id="kt_form" action="<?php echo e(route('store-bill')); ?>" method="post" enctype="multipart/form-data">
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
                    <div class="form-group">
                        <label for="billDate">Fatura Tarihi</label>
                        <input type="date" name="billDate" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                    </div>
                    <div class="form-group">
                        <label>Fatura Tipi</label>
                        <select name="billType" class="form-control customSelect2Box">
                            <option selected disabled hidden>Seçiniz</option>
                            <option value="1">Nakit</option>
                            <option value="2">Vadeli</option>
                        </select>
                    </div>
                    <input type="hidden" name="input_totalAmount" id="input_totalAmount" value="0">
                    <input type="hidden" name="input_totalDiscount" id="input_totalDiscount" value="0">
                    <input type="hidden" name="input_totalVAT" id="input_totalVAT" value="0">
                    <input type="hidden" name="input_totalAmountWithTaxes" id="input_totalAmountWithTaxes" value="0">
                    <input type="hidden" name="input_paidAmount" id="input_paidAmount" value="0">
                </div>
                <div class="col-6 mt-5">
                    <tbody>
                        <table class="table borderless mt-3">
                            <tr>
                                <th scope="row">Mal Hizmet Toplam Tutarı</th>
                                <td class="text-right py-3"><span id="totalAmount">0.00</span> TL</td>
                            </tr>
                            <tr>
                                <th scope="row">Toplam İskonto</th>
                                <td class="text-right py-3"><span id="totalDiscount">0.00</span> TL</td>
                            </tr>
                            <tr>
                                <th scope="row">Hesaplanan KDV</th>
                                <td class="text-right py-3"><span id="totalVAT">0.00</span> TL</td>
                            </tr>
                            <tr>
                                <th scope="row">Vergiler Dahil Toplam Tutar</th>
                                <td class="text-right py-3"><span id="totalAmountWithTaxes">0.00</span> TL</td>
                            </tr>
                            <tr>
                                <th scope="row">Ödenecek Tutar</th>
                                <td class="text-right py-3"><span id="paidAmount">0.00</span> TL</td>
                            </tr>
                        </table>
                    </tbody>
                </div>
            </div>
            <div id="options" class="mb-5">
                <div data-repeater-list="option_group">
                    <div data-repeater-item>
                        <input type="hidden" name="id" id="cat-id" />
                        <input type="hidden" name="index" id="repeaterIndex" />
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
                                            <input value="<?php echo e(old('productName')); ?>" type="text" class="form-control" placeholder="Ürün adı" name="productName">
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="unitPrice">Birim Fiyat</label>
                                            <input value="<?php echo e(old('unitPrice')); ?>" type="text" onblur="calculate(false)" class="form-control" placeholder="Ürünün birim fiyatı" name="unitPrice">
                                        </div>
                                    </div>


                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="quantity">Miktar</label>
                                            <input value="<?php echo e(old('quantity')); ?>" onblur="calculate(false)" type="text" class="form-control" placeholder="Ürün miktarı" name="quantity">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="quantityType">Miktar Tipi</label>
                                            <input value="<?php echo e(old('quantityType')); ?>" type="text" class="form-control" placeholder="Ör: kg, gr, adet, vs." name="quantityType">
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
                                                <input value="<?php echo e(old('vatRate')); ?>" onblur="calculate(false)" type="text" class="form-control" placeholder="KDV Oranı" name="vatRate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
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
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="discountRateofInc">İskonto Oranı</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">%</div>
                                                </div>
                                                <input value="<?php echo e(old('discountRateofInc')); ?>" onblur="calculate(false)" type="text" class="form-control" placeholder="İskonto Oranı" name="discountRateofInc">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
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
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="reasonforDiscountInc">İskonto Nedeni</label>
                                            <input value="<?php echo e(old('reasonforDiscountInc')); ?>" type="text" class="form-control" placeholder="İskonto Nedeni" name="reasonforDiscountInc">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="otherTaxes">Diğer Vergiler</label>
                                            <input value="<?php echo e(old('otherTaxes')); ?>" type="text" class="form-control" placeholder="Diğer Vergiler" name="otherTaxes">
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="totalAmount">Mal Hizmet Tutarı</label>
                                            <input value="<?php echo e(old('totalAmount')); ?>" id="totalAmount" type="text" class="form-control" placeholder="Mal Hizmet Tutarı" name="totalAmount">
                                        </div>
                                    </div>
                                    <div class="col-3 mt-5">
                                        <div class="form-group mt-3">
                                            <a data-repeater-delete onclick="calculate(true)" class="btn font-weight-bold btn-danger btn-icon" value="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function calculate(del) {
                                var counter = document.getElementById("repeaterIndex").value;
                                if (del) {
                                    counter = counter - 1;
                                }
                                let totalAmount = 0;
                                let totalDiscount = 0;
                                let totalVAT = 0;
                                let totalAmountWithTaxes = 0;
                                let paidAmount = 0;

                                for (let i = 0; i <= parseInt(counter); i++) {

                                    let unitPrice = document.getElementsByName("option_group[" + i + "]" + "[unitPrice]")[0].value;
                                    let quantity = document.getElementsByName("option_group[" + i + "]" + "[quantity]")[0].value;
                                    let vatRate = document.getElementsByName("option_group[" + i + "]" + "[vatRate]")[0].value;
                                    let discountRateofInc = document.getElementsByName("option_group[" + i + "]" + "[discountRateofInc]")[0].value;
                                    let price = unitPrice * quantity;
                                    let discount = price * discountRateofInc / 100;
                                    let vat = price * (1 + (vatRate / 100));
                                    document.getElementsByName("option_group[" + i + "]" + "[totalAmount]")[0].value = price.toFixed(2);
                                    document.getElementsByName("option_group[" + i + "]" + "[discountIncAmount]")[0].value = discount.toFixed(2);
                                    document.getElementsByName("option_group[" + i + "]" + "[vatAmount]")[0].value = (vat - price).toFixed(2);

                                    totalAmount += parseFloat(document.getElementsByName("option_group[" + i + "]" + "[totalAmount]")[0].value);
                                    console.log(totalAmount);
                                    totalDiscount += parseFloat(document.getElementsByName("option_group[" + i + "]" + "[discountIncAmount]")[0].value);
                                    totalVAT += parseFloat(document.getElementsByName("option_group[" + i + "]" + "[vatAmount]")[0].value);
                                }



                                totalAmountWithTaxes = totalAmount + totalVAT;
                                paidAmount = totalAmountWithTaxes - totalDiscount;

                                document.getElementById("totalAmount").innerHTML = totalAmount.toFixed(2);
                                document.getElementById("totalDiscount").innerHTML = totalDiscount.toFixed(2);
                                document.getElementById("totalVAT").innerHTML = totalVAT.toFixed(2);
                                document.getElementById("totalAmountWithTaxes").innerHTML = totalAmountWithTaxes.toFixed(2);
                                document.getElementById("paidAmount").innerHTML = paidAmount.toFixed(2);


                                document.getElementById("input_totalAmount").value = totalAmount.toFixed(2);
                                document.getElementById("input_totalDiscount").value = totalDiscount.toFixed(2);
                                document.getElementById("input_totalVAT").value = totalVAT.toFixed(2);
                                document.getElementById("input_totalAmountWithTaxes").value = totalAmountWithTaxes.toFixed(2);
                                document.getElementById("input_paidAmount").value = paidAmount.toFixed(2);

                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div data-repeater-create class="btn font-weight-bold btn-warning d-inline mr-3" value="Add">
                    <i class="fas fa-plus"></i>
                    Ürün Ekle
                </div>
                <button type="submit" class="btn btn-primary mr-2">Faturayı Kaydet</button>
            </div>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/bill/create.blade.php ENDPATH**/ ?>