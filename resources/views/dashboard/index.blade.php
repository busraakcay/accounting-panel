@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-xl-3">
        <a href="">
            <div class="card card-custom bg-info card-stretch gutter-b">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-white mb-2">
                                Şubelerim
                            </h6>
                            <span class="h3 mb-0 text-white">
                               
                            </span>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3">
        <a href="">
            <div class="card card-custom bg-success card-stretch gutter-b">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-white mb-2">
                                Anlaşmalı Firmalarım
                            </h6>
                            <span class="h3 mb-0 text-white">
                               
                            </span>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3">
        <a href="">
            <div class="card card-custom bg-warning card-stretch gutter-b">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-white mb-2">
                                Faturalarım
                            </h6>
                            <span class="h3 mb-0 text-white">
                                
                            </span>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3">
        <a href="">
            <div class="card card-custom bg-danger card-stretch gutter-b">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="card-title text-uppercase text-white mb-2">
                                Borçlarım
                            </h6>
                            <span class="h3 mb-0 text-white">
                                
                            </span>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="card card-custom gutter-b">
    <div class="card-header border-0 py-5 ribbon ribbon-clip ribbon-left">
        <div class="ribbon-target" style="top: 15px; height: 45px;">
            <span class="ribbon-inner bg-danger"></span><i class="fa fa-bomb text-white"></i>
        </div>
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark ml-5">Ödemesi Yaklaşan Borçlarım</span>
        </h3>
        <div class="card-toolbar">
            <a href="" class="btn btn-info font-weight-bolder font-size-sm">Tüm Borçları Görüntüle</a>
        </div>
    </div>
    <div class="card-body py-0">
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                <thead class="datatable-head">
                    <tr class="datatable-row" style="left: 0px;">
                        <th class="datatable-cell datatable-toggle-detail"><span></span></th>
                        <th data-field="Sipariş Numarası" class="datatable-cell datatable-cell-sort"><span style="width: 80px;">Sipariş No</span></th>
                        <th data-field="Sipariş Sahibi" class="datatable-cell datatable-cell-sort"><span style="width: 110px;">Sipariş Sahibi</span></th>
                        <th data-field="Sipariş Tarihi" class="datatable-cell datatable-cell-sort"><span style="width: 125px;">Sipariş Tarihi</span></th>
                        <th data-field="Kargo Şirketi" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">Kargo Şirketi</span></th>
                        <th data-field="Status" class="datatable-cell datatable-cell-sort"><span style="width: 140px;">Sipariş Durumu</span></th>
                        <th data-field="Ödeme Yöntemi" data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 150px;">Ödeme Yöntemi</span></th>
                        <th data-field="Sipariş Tutarı" data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 130px;">Sipariş Tutarı</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="8">
                            <h4 class="text-muted m-5"><i>Henüz herhangi bir sipariş bulunmamaktadır</i></h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection