@extends('layouts.master')
@section('content')

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Yeni Admin Ekle
        </h3>
    </div>
    <form action="{{ route('store-admin') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ad<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                    </div>
                </div>
                <div class="col-6">

                    <div class="form-group">
                        <label>Soyad<span class="text-danger">*</span></label>
                        <input type="text" name="surname" class="form-control" value="{{ old('surname') }}" />
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Kullanıcı Adı<span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Yönetici Tipi<span class="text-danger">*</span></label>
                        <select name="type" class="form-control customSelect2Box">
                            <option selected disabled hidden>Seçiniz</option>
                            <option value="1">Root</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-group">
                        <label>E-mail<span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Telefon<span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" />
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Şifre<span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Tekrar Şifre<span class="text-danger">*</span></label>
                        <input type="password" name="repassword" class="form-control" />
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