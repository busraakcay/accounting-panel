<div class="modal fade editCompany" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Firma Güncelle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <input type="hidden" wire:model="upd_companyId">
                    <div class="form-group">
                        <label for="upd_name">Ad</label>
                        <input type="text" class="form-control" placeholder="Ad" wire:model="upd_name">
                        <span class="text-danger"> @error('upd_name') {{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="upd_type">Açıklama</label>
                        <textarea class="form-control" rows="3" wire:model="upd_description"></textarea>
                        <span class="text-danger"> @error('upd_description') {{ $message }}@enderror</span>
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