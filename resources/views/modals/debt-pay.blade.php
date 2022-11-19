<div class="modal fade editDebt" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ödenen Borç</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="paidAmountUpdate">
                    <input type="hidden" wire:model="debtId">
                    <div class="form-group">
                        <label for="paidAmount"><b>{{ $companyName }}</b> için ödenen miktar</label>
                        <input type="text" class="form-control" placeholder="Ödenen miktarı giriniz" wire:model="paidAmount">
                        <span class="text-danger"> @error('paidAmount') {{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Güncelle</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">İptal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>