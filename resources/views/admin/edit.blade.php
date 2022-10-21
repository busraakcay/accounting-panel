@extends('layouts.master')
@section('content')

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            {{ $user->name }} Yöneticisini Güncelle
        </h3>
    </div>
    <form action="{{ route('update-admin', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ad<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" />
                    </div>
                </div>
                <div class="col-6">

                    <div class="form-group">
                        <label>Soyad<span class="text-danger">*</span></label>
                        <input type="text" name="surname" class="form-control" value="{{ $user->surname }}" />
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Kullanıcı Adı<span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Yönetici Tipi<span class="text-danger">*</span></label>
                        <select name="type" class="form-control customSelect2Box">
                            <option value="1" {{$user->type == 1 ? 'selected' : ''}}>Root</option>
                            <option value="2" {{$user->type == 2 ? 'selected' : ''}}>Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-group">
                        <label>E-mail<span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Telefon<span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" />
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Şifre <span class="text-danger font-weight-bold">*Yeni şifre belirle</span></label>
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
            <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
            <button type="reset" class="btn btn-secondary">İptal</button>
        </div>
    </form>
</div>

@endsection