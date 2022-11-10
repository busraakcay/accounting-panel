@php
$products = getProducts($billId)
@endphp
<div class="modal fade billView">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-height: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="justify-content: center;">{{ $companyName }}</h3>
                <div class="d-block" style="text-align: center;">
                    <div>
                        <h5 class="card-label"> {{ $billType == 1 ? 'Nakit' : 'Vadeli' }}</h5>
                    </div>
                    <div>
                        <h5 class="card-label"> {{ $billDate }}</h5>
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
                                    @forelse ($products as $product)
                                    <tr class="datatable-row">
                                        <td width="10%" class="datatable-cell" data-label="Mal Hizmet">{{$product->name}}</td>
                                        <td width="10%" class="datatable-cell" data-label="Miktar">{{ $product->quantity }}{{ ' ' }}{{ $product->quantity_type }}</td>
                                        <td width="10%" class="datatable-cell" data-label="Birim Fiyat">@money($product->unit_price)</td>
                                        <td width="10%" class="datatable-cell" data-label="İskonto Oranı">%{{$product->discount_rateof_inc}}</td>
                                        <td width="10%" class="datatable-cell" data-label="İskonto Tutarı">@money($product->discount_inc_amount)</td>
                                        <td width="10%" class="datatable-cell" data-label="İskonto Nedeni">{{$product->reasonfor_discount_inc}}</td>
                                        <td width="10%" class="datatable-cell" data-label="KDV Oranı">%{{$product->vat_rate}}</td>
                                        <td width="10%" class="datatable-cell" data-label="KDV Tutarı">@money($product->vat_amount)</td>
                                        <td width="10%" class="datatable-cell" data-label="Diğer Vergiler">{{ Str::limit($product->other_taxes, 15, "...")}}</td>
                                        <td width="10%" class="datatable-cell" data-label="Toplam Tutar">@money($product->total_amount)</td>
                                    </tr>
                                    @empty
                                    <tr class="datatable-row">
                                        <td width="100%" class="text-left datatable-cell">
                                            <h6><i>Herhangi bir kayıt bulunamadı.</i></h6>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="col-5 mt-5 float-right mb-5">
                        <table class="mt-5 float-right">
                            <tbody>
                                <tr>
                                    <th class="pr-5 pt-4" scope="row">Toplam Tutar</th>
                                    <td class="pt-4 pl-5 float-right">@money($billTotalAmount)</td>
                                </tr>
                                <tr>
                                    <th class="pr-5 pt-4" scope="row">Toplam KDV Tutarı</th>
                                    <td class="pt-4 pl-5 float-right">@money($totalVATAmount)</td>
                                </tr>

                                <tr>
                                    <th class="pr-5 pt-4" scope="row">Toplam İskonto Tutarı</th>
                                    <td class="pt-4 pl-5 float-right">@money($totalDiscountIncAmount)</td>
                                </tr>

                                <tr>
                                    <th class="pr-5 pt-4" scope="row">Tüm Vergiler Dahil Tutar</th>
                                    <td class="pt-4 pl-5 float-right">@money($totalAmountWithTaxes)</td>
                                </tr>
                                <tr>
                                    <th class="pr-5 pt-4" scope="row">Ödenecek Tutar</th>
                                    <td class="pt-4 pl-5 float-right">@money($totalPaidAmount)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>