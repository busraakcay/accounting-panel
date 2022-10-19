<div class="modal fade editExpense" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gider Güncelle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="upd_expenseId">
                    <div class="form-group">
                        <label for="upd_name">Ad</label>
                        <input type="text" class="form-control" placeholder="Ad" wire:model="upd_name">
                        <span class="text-danger"> @error('upd_name') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="upd_amount">Miktar</label>
                        <input type="text" class="form-control" placeholder="Miktar" wire:model="upd_amount">
                        <span class="text-danger"> @error('upd_amount') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="upd_expenseType">Tür</label>
                        <select class="form-control" wire:model="upd_expenseType">
                            @foreach ($expenseTypes as $expenseType)
                            <option value="{{ $expenseType->id }}" {{ $this->upd_expenseType == $expenseType->id ? 'selected' : '' }}>{{ $expenseType->name }}</option>
                            @endforeach

                        </select>
                        <span class="text-danger"> @error('upd_expenseType') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="upd_type">Açıklama</label>
                        <textarea class="form-control" rows="3" wire:model="upd_description"></textarea>
                        <span class="text-danger"> @error('upd_description') {{ $message }}@enderror</span>
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