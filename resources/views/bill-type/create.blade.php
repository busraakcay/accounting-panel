@extends('layouts.master')
@section('content')

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Yeni Gelir/Gider Türü Ekle
        </h3>
    </div>
    <form class="form repeater" id="kt_form" action="{{ route('store-bill-type') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    <div class="my-5">
                        <div class="form-group row">
                            <label class="col-3">Tür</label>
                            <div class="col-8">
                                <select class="form-control customSelect2Box" name="billType" id="billType">
                                    <option value="1">Gelir</option>
                                    <option value="2">Gider</option>
                                </select>
                            </div>
                        </div>
                        <div id="options">
                            <div data-repeater-list="option_group">
                                <div data-repeater-item>
                                    <input type="hidden" name="id" id="cat-id" />
                                    <div class="form-group row">
                                        <div class="col-10">
                                            <input class="form-control" type="text" placeholder="Açıklama" name="description" />
                                        </div>
                                        <a href="javascript:;" data-repeater-delete class="btn font-weight-bold btn-danger btn-icon" value="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-repeater-create class="btn font-weight-bold btn-primary" value="Add">
                                <i class="fas fa-plus"></i>
                                Ekle
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">Ekle</button>
            <button type="reset" class="btn btn-secondary">İptal</button>
        </div>
    </form>
</div>

@endsection