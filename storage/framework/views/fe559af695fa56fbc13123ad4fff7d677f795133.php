
<?php $__env->startSection('content'); ?>

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            <?php echo e($product->name); ?> Ürününü Güncelle
        </h3>
    </div>
    <form action="<?php echo e(route('product-update', [$product->id, $billId])); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="productName">Mal Hizmet</label>
                        <input value="<?php echo e($product->name); ?>" type="text" class="form-control" placeholder="Ürün adı" name="productName">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="unitPrice">Birim Fiyat</label>
                        <input value="<?php echo e($product->unit_price); ?>" onblur="calculate()" type="text" class="form-control" placeholder="Ürünün birim fiyatı" name="unitPrice" id="unitPrice">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="quantity">Miktar</label>
                                <input value="<?php echo e($product->quantity); ?>" onblur="calculate()" type="text" class="form-control" placeholder="Ürün miktarı" name="quantity" id="quantity">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="quantityType">Miktar Tipi</label>
                                <input value="<?php echo e($product->quantity_type); ?>" type="text" class="form-control" placeholder="Ör: kg, gr, adet, vs." name="quantityType">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="totalAmount">Mal Hizmet Tutarı</label>
                        <input value="<?php echo e($product->total_amount); ?>" type="text" class="form-control" placeholder="Mal Hizmet Tutarı" name="totalAmount" id="totalAmount">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="vatRate">KDV Oranı</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                            </div>
                            <input value="<?php echo e($product->vat_rate); ?>" onblur="calculate()" type="text" class="form-control" placeholder="KDV Oranı" name="vatRate" id="vatRate">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="vatAmount">KDV Tutarı</label>
                        <div class="input-group">
                            <input value="<?php echo e($product->vat_amount); ?>" type="text" class="form-control" placeholder="KDV Tutarı" name="vatAmount" id="vatAmount">
                            <div class="input-group-prepend">
                                <div class="input-group-text">TL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="discountRateofInc">İskonto Oranı</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                            </div>
                            <input value="<?php echo e($product->discount_rateof_inc); ?>" onblur="calculate()" type="text" class="form-control" placeholder="İskonto Oranı" name="discountRateofInc" id="discountRateofInc">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="discountIncAmount">İskonto Tutarı</label>
                        <div class="input-group">
                            <input value="<?php echo e($product->discount_inc_amount); ?>" type="text" class="form-control" placeholder="İskonto Tutarı" name="discountIncAmount" id="discountIncAmount">
                            <div class="input-group-prepend">
                                <div class="input-group-text">TL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="reasonforDiscountInc">İskonto Nedeni</label>
                        <input value="<?php echo e($product->reasonfor_discount_inc); ?>" type="text" class="form-control" placeholder="İskonto Nedeni" name="reasonforDiscountInc">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="otherTaxes">Diğer Vergiler</label>
                        <input value="<?php echo e($product->other_taxes); ?>" type="text" class="form-control" placeholder="Diğer Vergiler" name="otherTaxes">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
                <button type="reset" class="btn btn-secondary">İptal</button>
            </div>
        </div>
    </form>
</div>
<script>
    function calculate() {
        let unitPrice = document.getElementById("unitPrice").value;
        let quantity = document.getElementById("quantity").value;
        let vatRate = document.getElementById("vatRate").value;
        let discountRateofInc = document.getElementById("discountRateofInc").value;
        let price = unitPrice * quantity;
        let discount = price * discountRateofInc / 100;
        let vat = price * (1 + (vatRate / 100));
        console.log(unitPrice, quantity, vatRate, discountRateofInc, price, discount, vat);
        document.getElementById("totalAmount").value = price.toFixed(2);
        document.getElementById("discountIncAmount").value = discount.toFixed(2);
        document.getElementById("vatAmount").value = (vat - price).toFixed(2);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/product/edit.blade.php ENDPATH**/ ?>