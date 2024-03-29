<div class="container">
    <div class="card card-custom  gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Gelirler</h3>
            </div>
            <div class="card-toolbar">
                <a wire:click="OpenCreateIncomeModal()" class="btn btn-primary font-weight-bolder">
                    Gelir Ekle</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-6">
                    <label for="startDate">Başlangıç Tarihi Seç</label>
                    <input type="date" wire:model.debounce.300ms="startDate" class="form-control" />
                </div>
                <div class="form-group col-6">
                    <label for="finishDate">Bitiş Tarihi Seç</label>
                    <input type="date" wire:model.debounce.300ms="finishDate" class="form-control" />
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="input-icon">
                        <input type="text" class="form-control" wire:model.debounce.350ms="search" placeholder="Gelir Ara...">
                        <span>
                            <i class="fa fa-search text-muted"></i>
                        </span>
                    </div>
                </div>
                <div class="dropdown bootstrap-select col-6">
                    <div class="form-group">
                        <select class="form-control" wire:model="orderByType">
                            <option value="" selected>Tüm Türler</option>
                            @foreach ($incomeTypes as $incomeType)
                            <option value="{{ $incomeType->id }}">{{ $incomeType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded">
                <table id="place" class="table-stack datatable-table">
                    <thead class="datatable-head">
                        <tr class="datatable-row">
                            <th width="20%" class="datatable-cell datatable-toggle-detail">Ad</th>
                            <th width="20%" class="datatable-cell datatable-toggle-detail">Toplam Tutar</th>
                            <th width="20%" class="datatable-cell datatable-toggle-detail">Tür</th>
                            <th width="30%" class="datatable-cell datatable-toggle-detail">Açıklama</th>
                            <th width="10%" class="datatable-cell datatable-toggle-detail">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody class="datatable-body">
                        @forelse ($incomes as $income)
                        <tr class="datatable-row">
                            <td width="20%" class="datatable-cell" data-label="Ad">{{$income->name}}</td>
                            <td width="20%" class="datatable-cell" data-label="Toplam Tutar">@money($income->amount)</td>
                            <td width="20%" class="datatable-cell" data-label="Tür">{{$income->incomeType->name}}</td>
                            <td width="30%" class="datatable-cell" data-label="Açıklama">{{ Str::limit($income->description, 255, "...")}}</td>
                            <td width="10%" class="datatable-cell" data-label="İşlemler">
                                <span>
                                    <a wire:click="OpenEditIncomeModal({{$income->id}})" class="btn btn-sm btn-light btn-text-primary btn-icon mr-2" title="Güncelle">
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
                                    <a wire:click="deleteConfirm({{ $income->id }})" class="btn btn-sm btn-light btn-text-primary btn-icon" title="Sil">
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
                <div class='container mt-5'>
                    <span class='d-flex justify-content-center'>{{$incomes->links()}}</span>
                </div>
            </div>
        </div>
        <script>
            window.addEventListener('OpenCreateIncomeModal', function() {
                $('.createIncome').find('span').html('');
                $('.createIncome').find('form')[0].reset();
                $('.createIncome').modal('show');
            });
            window.addEventListener('CloseCreateIncomeModal', function(e) {
                $('.createIncome').find('span').html('');
                $('.createIncome').find('form')[0].reset();
                $('.createIncome').modal('hide');
                Swal.fire(e.detail)
            });

            window.addEventListener('OpenEditIncomeModal', function(event) {
                $('.editIncome').find('span').html('');
                $('.editIncome').modal('show');
            });
            window.addEventListener('CloseEditIncomeModal', function(event) {
                $('.editIncome').find('span').html('');
                $('.editIncome').find('form')[0].reset();
                $('.editIncome').modal('hide');
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
    </div>
    @include('modals.income.create')
    @include('modals.income.edit')
</div>