@extends('layouts.superAdminLayout')
@section('SuperAdminContent')

    <span class="fs-1">banks</span>

    <hr class="me-3">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-4 mx-auto">
                @include('components.superAdmin.banks.bankAllDetails')
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-2 mx-auto">
                @include('components.superAdmin.banks.registerBanks')
            </div>
            <div class="col-md-6 col-sm-10 mx-auto">
                @include('components.superAdmin.banks.bankList')
            </div>
        </div>
    </div>

@endsection