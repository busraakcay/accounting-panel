@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card card-custom  gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Şubeler</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('create-branch') }}" class="btn btn-primary font-weight-bolder">
                    Şube Ekle</a>
            </div>
        </div>
        @livewire('branch-table')
    </div>
</div>
@endsection