@extends('layouts.master')
@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Fatura Güncelle</h3>
        </div>
        <div class="card-toolbar">
            <a href="" class="btn btn-primary font-weight-bolder mr-2">
                Faturaya Yeni Ürün Ekle</a>
        </div>
    </div>
    <form class="form repeater" id="kt_form" action="{{ route('update-bill', $bill->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="company">Firma</label>
                        <select class="form-control customSearchSelect2Box" name="company">
                            <option value="" selected hidden>Seçiniz</option>
                            @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{$bill->company_id == $company->id ? 'selected' : ''}}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="billDate">Fatura Tarihi</label>
                        <input value="{{ $bill->bill_date->format('Y-m-d') }}" type="date" name="billDate" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Fatura Tipi</label>
                        <select name="billType" class="form-control customSelect2Box">
                            <option selected disabled hidden>Seçiniz</option>
                            <option value="1" {{$bill->bill_type == 1 ? 'selected' : 'disabled'}}>Nakit</option>
                            <option value="2" {{$bill->bill_type == 2 ? 'selected' : 'disabled'}}>Vadeli</option>
                        </select>
                    </div>
                    <input type="hidden" name="input_totalAmount" id="input_totalAmount" value="{{ $bill->total_amount }}">
                    <input type="hidden" name="input_totalDiscount" id="input_totalDiscount" value="{{ $bill->total_discount_inc_amount }}">
                    <input type="hidden" name="input_totalVAT" id="input_totalVAT" value="{{ $bill->total_vat_amount }}">
                    <input type="hidden" name="input_totalAmountWithTaxes" id="input_totalAmountWithTaxes" value="{{ $bill->total_amount_with_taxes }}">
                    <input type="hidden" name="input_paidAmount" id="input_paidAmount" value="{{ $bill->total_paid_amount }}">
                </div>
                <div class="col-6 mt-5">
                    <tbody>
                        <table class="table borderless mt-3">
                            <tr>
                                <th scope="row">Mal Hizmet Toplam Tutarı</th>
                                <td class="text-right py-3"><span id="totalAmount">@money($bill->total_amount)</span></td>
                            </tr>
                            <tr>
                                <th scope="row">Toplam İskonto</th>
                                <td class="text-right py-3"><span id="totalDiscount">@money($bill->total_discount_inc_amount)</span></td>
                            </tr>
                            <tr>
                                <th scope="row">Hesaplanan KDV</th>
                                <td class="text-right py-3"><span id="totalVAT">@money($bill->total_vat_amount)</span></td>
                            </tr>
                            <tr>
                                <th scope="row">Vergiler Dahil Toplam Tutar</th>
                                <td class="text-right py-3"><span id="totalAmountWithTaxes">@money($bill->total_amount_with_taxes)</span></td>
                            </tr>
                            <tr>
                                <th scope="row">Ödenecek Tutar</th>
                                <td class="text-right py-3"><span id="paidAmount">@money($bill->total_paid_amount)</span></td>
                            </tr>
                        </table>
                    </tbody>
                </div>
            </div>
            <div class="my-5">
                <div class="my-5">
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
                                @forelse ($products as $product)
                                <tr class="datatable-row">
                                    <td width="13%" class="datatable-cell" data-label="Mal Hizmet">{{$product->name}}</td>
                                    <td width="13%" class="datatable-cell" data-label="Miktar">{{ $product->quantity }}{{ ' ' }}{{ $product->quantity_type }}</td>
                                    <td width="13%" class="datatable-cell" data-label="Birim Fiyat">@money($product->unit_price)</td>
                                    <td width="13%" class="datatable-cell" data-label="İskonto Tutarı">@money($product->discount_inc_amount)</td>
                                    <td width="13%" class="datatable-cell" data-label="İskonto Nedeni">{{$product->reasonfor_discount_inc}}</td>
                                    <td width="13%" class="datatable-cell" data-label="KDV Tutarı">@money($product->vat_amount)</td>
                                    <td width="13%" class="datatable-cell" data-label="Toplam Tutar">@money($product->total_amount)</td>
                                    <td width="13%" class="datatable-cell" data-label="İşlemler">
                                        <span>
                                            <a href="" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" title="Güncelle">
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
                                            <a href="" class="btn btn-sm btn-light btn-text-primary btn-icon" title="Sil">
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
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
            </div>
        </div>
    </form>
</div>

@endsection