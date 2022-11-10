<div class="col-xl-12">

    <div class="card card-custom bg-white card-stretch gutter-b">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-6">
                    <h6 class="card-title text-uppercase text-secondary mb-5">
                        Net Kâr Zarar Sorgula
                    </h6>
                    <div class="row mb-5">
                        <div class="form-group col-6 mb-5">
                            <label for="startDate">Başlangıç Tarihi Seç</label>
                            <input type="date" wire:model.debounce.300ms="startDate" class="form-control" />
                        </div>
                        <div class="form-group col-6 mb-5">
                            <label for="finishDate">Bitiş Tarihi Seç</label>
                            <input type="date" wire:model.debounce.300ms="finishDate" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <span class="h3 mb-0 text-primary float-right">
                        <h2><?php echo e(number_format($profitAndLoss,  2, ',', '.')); ?> <b>₺</b></h2>
                    </span>
                </div>
                <div class="col-auto">
                    <i class="fas fa-minus text-white"></i>
                </div>
            </div>
        </div>
    </div>

</div><?php /**PATH C:\xampp\htdocs\boltat\resources\views/livewire/dashboard-mounthly-report.blade.php ENDPATH**/ ?>