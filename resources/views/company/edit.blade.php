@extends('layouts.master')
@section('content')

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            {{ $company->name }} Firmasını Güncelle
        </h3>
    </div>
    <form action="{{ route('update-company', $company->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group row">
                <div class="col-12">
                    <div class="form-group">
                        <label>Ad<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $company->name }}" />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Açıklama<span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="8" name="description">{{ $company->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
            <button type="reset" class="btn btn-secondary">İptal</button>
        </div>
    </form>
</div>

@endsection