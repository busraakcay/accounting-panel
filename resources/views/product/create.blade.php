@extends('layouts.master')
@section('content')

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Faturaya Yeni Ürün Ekle
        </h3>
    </div>
    <form action="{{ route('product-store',  $billId) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="productName">Mal Hizmet</label>
                        <input value="{{ old('productName') }}" type="text" class="form-control" placeholder="Ürün adı" name="productName">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="unitPrice">Birim Fiyat</label>
                        <input value="{{ old('unitPrice') }}" onblur="calculate()" type="text" class="form-control" placeholder="Ürünün birim fiyatı" name="unitPrice" id="unitPrice">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="quantity">Miktar</label>
                                <input value="{{ old('quantity') }}" onblur="calculate()" type="text" class="form-control" placeholder="Ürün miktarı" name="quantity" id="quantity">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="quantityType">Miktar Tipi</label>
                                <input value="{{ old('quantityType') }}" type="text" class="form-control" placeholder="Ör: kg, gr, adet, vs." name="quantityType">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="totalAmount">Mal Hizmet Tutarı</label>
                        <input value="{{ old('totalAmount') }}" type="text" class="form-control" placeholder="Mal Hizmet Tutarı" name="totalAmount" id="totalAmount">
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
                            <input value="{{ old('vatRate') }}" onblur="calculate()" type="text" class="form-control" placeholder="KDV Oranı" name="vatRate" id="vatRate">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="vatAmount">KDV Tutarı</label>
                        <div class="input-group">
                            <input value="{{ old('vatAmount') }}" type="text" class="form-control" placeholder="KDV Tutarı" name="vatAmount" id="vatAmount">
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
                            <input value="{{ old('discountRateofInc') }}" onblur="calculate()" type="text" class="form-control" placeholder="İskonto Oranı" name="discountRateofInc" id="discountRateofInc">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="discountIncAmount">İskonto Tutarı</label>
                        <div class="input-group">
                            <input value="{{ old('discountIncAmount') }}" type="text" class="form-control" placeholder="İskonto Tutarı" name="discountIncAmount" id="discountIncAmount">
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
                        <input value="{{ old('reasonforDiscountInc') }}" type="text" class="form-control" placeholder="İskonto Nedeni" name="reasonforDiscountInc">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="otherTaxes">Diğer Vergiler</label>
                        <input value="{{ old('otherTaxes') }}" type="text" class="form-control" placeholder="Diğer Vergiler" name="otherTaxes">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
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
@endsection