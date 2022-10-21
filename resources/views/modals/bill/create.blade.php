<div class="modal fade createBill" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fatura Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="company">Firma</label>
                                <select class="form-control" wire:model="company">
                                    <option value="" selected hidden>Seçiniz</option>
                                    @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach

                                </select>
                                <span class="text-danger"> @error('company') {{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="productName">Mal Hizmet</label>
                                <input type="text" class="form-control" placeholder="Ürün adı" wire:model="productName">
                                <span class="text-danger"> @error('productName') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="unitPrice">Birim Fiyat</label>
                                <input type="text" class="form-control" placeholder="Ürünün birim fiyatı" wire:model="unitPrice">
                                <span class="text-danger"> @error('unitPrice') {{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="billDate">Fatura Tarihi</label>
                                <input type="date" wire:model="billDate" class="form-control" value="@php echo date('Y-m-d'); @endphp" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="quantity">Miktar</label>
                                <input type="text" class="form-control" placeholder="Ürün miktarı" wire:model="quantity">
                                <span class="text-danger"> @error('quantity') {{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="quantityType">Miktar Tipi</label>
                                <input type="text" class="form-control" placeholder="Ör: kg, gr, adet, vs." wire:model="quantityType">
                                <span class="text-danger"> @error('quantityType') {{ $message }}@enderror</span>
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
                                    <input type="text" class="form-control" placeholder="KDV Oranı" wire:model="vatRate">
                                </div>
                                <span class="text-danger"> @error('vatRate') {{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="vatAmount">KDV Tutarı</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="KDV Tutarı" wire:model="vatAmount">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">TL</div>
                                    </div>
                                </div>
                                <span class="text-danger"> @error('vatAmount') {{ $message }}@enderror</span>
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
                                    <input type="text" class="form-control" placeholder="İskonto Oranı" wire:model="discountRateofInc">

                                </div>
                                <span class="text-danger"> @error('discountRateofInc') {{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="discountIncAmount">İskonto Tutarı</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="İskonto Tutarı" wire:model="discountIncAmount">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">TL</div>
                                    </div>
                                </div>
                                <span class="text-danger"> @error('discountIncAmount') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="reasonforDiscountInc">İskonto Nedeni</label>
                                <input type="text" class="form-control" placeholder="İskonto Nedeni" wire:model="reasonforDiscountInc">
                                <span class="text-danger"> @error('reasonforDiscountInc') {{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="otherTaxes">Diğer Vergiler</label>
                                <input type="text" class="form-control" placeholder="Diğer Vergiler" wire:model="otherTaxes">
                                <span class="text-danger"> @error('otherTaxes') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Fatura Tipi</label>
                                <select wire:model="billType" class="form-control customSelect2Box">
                                    <option selected disabled hidden>Seçiniz</option>
                                    <option value="1">Nakit</option>
                                    <option value="2">Vadeli</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="totalAmount">Mal Hizmet Tutarı</label>
                                <input type="text" class="form-control" placeholder="Mal Hizmet Tutarı" wire:model="totalAmount">
                                <span class="text-danger"> @error('totalAmount') {{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Kaydet</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">İptal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>