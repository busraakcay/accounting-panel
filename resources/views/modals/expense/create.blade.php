<div class="modal fade createExpense" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gider Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="name">Ad</label>
                        <input type="text" class="form-control" placeholder="Ad" wire:model="name">
                        <span class="text-danger"> @error('name') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="amount">Miktar</label>
                        <input type="text" class="form-control" placeholder="Miktar" wire:model="amount">
                        <span class="text-danger"> @error('amount') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="expenseType">Tür</label>
                        <select class="form-control" wire:model="expenseType">
                            <option value="">Seçiniz</option>
                            @foreach ($expenseTypes as $expenseType)
                            <option value="{{ $expenseType->id }}">{{ $expenseType->name }}</option>
                            @endforeach

                        </select>
                        <span class="text-danger"> @error('expenseType') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="type">Açıklama</label>
                        <textarea class="form-control" rows="3" wire:model="description"></textarea>
                        <span class="text-danger"> @error('description') {{ $message }}@enderror</span>
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