<div class="card-body">
    <div class="row">
        <div class="col-5">
            <div class="input-icon">
                <input type="text" class="form-control" wire:model.debounce.350ms="search" placeholder="Belirli bir fiyattan büyük borç ara....">
                <span>
                    <i class="fa fa-search text-muted"></i>
                </span>
            </div>
        </div>
        <div class="dropdown bootstrap-select col-3">
            <div class="form-group">
                <select class="form-control" wire:model="orderByCompany">
                    <option value="" selected>Tüm Firmalar</option>
                    @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="dropdown bootstrap-select col-3">
            <div class="form-group">
                <select class="form-control" wire:model="filterByPaid">
                    <option value="" selected>Tüm Borçlar</option>
                    <option value="1" selected>Ödenmemiş Borçlar</option>
                    <option value="2" selected>Ödenmiş Borçlar</option>
                </select>
            </div>
        </div>
    </div>
    <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
        <table id="place" class="table-stack datatable-table">
            <thead class="datatable-head">
                <tr class="datatable-row">
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Firma</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Fatura Tarihi</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Toplam Borç</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Tahsilat</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">Kalan Bakiye</th>
                    <th width="11%" class="datatable-cell datatable-toggle-detail">İşlemler</th>
                </tr>
            </thead>
            <tbody class="datatable-body">
                @forelse ($debts as $bill)
                <tr class="datatable-row">
                    <td width="11%" class="datatable-cell" data-label="Firma">{{$bill->company->name}}</td>
                    <td width="11%" class="datatable-cell" data-label="Fatura Tarihi">{{$bill->bill_date->format('d.m.Y')}}</td>
                    <td width="11%" class="datatable-cell" data-label="Toplam Borç">@money($bill->total_paid_amount)</td>
                    <td width="11%" class="datatable-cell" data-label="Tahsilat">@money(paidDebt($bill->id))</td>
                    <td width="11%" class="datatable-cell" data-label="Kalan Bakiye">@money(remainDebt($bill->id))</td>
                    <td width="11%" class="datatable-cell" data-label="İşlemler">
                        @if(remainDebt($bill->id) != 0)
                        <span>
                            <a wire:click="OpenEditDebtModal({{ $bill->id }})" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" title="Güncelle">
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
                        </span>
                        @else
                        <span>
                            <span class="label font-weight-bold label-lg label-inline label-light-success">Borç yok
                            </span>
                        </span>
                        @endif
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
        <div class='container mt-5'>
            <span class='d-flex justify-content-center'>{{$debts->links()}}</span>
        </div>
    </div>
    @include('modals.debt-pay')
    <div class="col-5 mt-5 float-right">
        <table class="mt-5 float-right">
            <tbody>
                <tr>
                    <th class="pr-5 pt-4" scope="row">Toplam Borç Tutarı</th>
                    <td class="pt-4 float-right">@money($totalDebt)</td>
                </tr>
                <tr>
                    <th class="pr-5 pt-4" scope="row">Toplam Tahsilat Tutarı</th>
                    <td class="pt-4 float-right">@money($paidDebt)</td>
                </tr>
                <tr>
                    <th class="pr-5 pt-4" scope="row">Kalan Bakiye Tutarı</th>
                    <td class="pt-4 float-right">@money($totalDebt - $paidDebt)</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    window.addEventListener('OpenEditDebtModal', function(event) {
        $('.editDebt').find('span').html('');
        $('.editDebt').modal('show');
    });
    window.addEventListener('CloseEditDebtModal', function(event) {
        $('.editDebt').find('span').html('');
        $('.editDebt').find('form')[0].reset();
        $('.editDebt').modal('hide');
        Swal.fire(event.detail)
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
</script>