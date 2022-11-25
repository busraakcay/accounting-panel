<div class="col-xl-12 p-5">
    <div class="card card-custom bg-white card-stretch gutter-b">
        <div class="card-body">
            <div class="row align-items-center mt-5">
                <div class="col-6">
                    <h6 class="card-title text-uppercase text-secondary mb-5"  style="font-size:18px">
                        Net Kâr Zarar Sorgula
                    </h6>
                    <br>
                    <div class="row mt-5">
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
                    <div style="display: flex;
                                justify-content: center;
                                align-items: center;">
                        <div style="width: 250px;
                                height: 250px;
                                line-height: 250px;
                                border-radius: 50%;
                                font-size: 25px;
                                color: #fff;
                                text-align: center;
                                font-weight: bold;
                                background: #1e1e2d">
                            {{ number_format($profitAndLoss,  2, ',', '.') }} ₺
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-minus text-white"></i>
                </div>
            </div>
        </div>
    </div>

</div>