@extends('layouts.master')
@section('content')

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Yeni Firma Ekle
        </h3>
    </div>
    <form action="{{ route('store-company') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <div class="col-12">
                    <div class="form-group">
                        <label>Ad<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Açıklama<span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="8" name="description">{{ old('amountCash') }}</textarea>
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