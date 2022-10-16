@extends('layouts.master')
@section('content')

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            {{ $branch->name }} Şubesini Güncelle
        </h3>
    </div>
    <form action="{{ route('update-branch', $branch->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ad<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $branch->name }}" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Nakit Miktarı<span class="text-danger">*</span></label>
                        <input type="text" name="amountCash" class="form-control" value="{{ $branch->amount_cash }}" />
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