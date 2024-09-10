@extends('layouts.superAdminLayout')
@section('SuperAdminContent')

    {{-- <span class="fs-5">banks</span> --}}
    <div class="fs-3 ms-4">Banks</div>

    <hr class="me-3">

    

    <div class="container-fluid">

        {{-- btn for user registration model --}}
        <div class="d-grid gap-2 mb-4 d-md-flex justify-content-md-end">
            <button class="btn btn-primary me-md-5" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Register Banks</button>
        </div>
        {{-- include model --}}
        @include('components.superAdmin.banks.registerBanks')
        {{-- end user registration section --}}

        <div class="row">
            <div class="col-md-12 col-sm-4 mx-auto">
                @include('components.superAdmin.banks.bankAllDetails')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6 mx-auto">
                @include('components.superAdmin.banks.bankList')
            </div>
        </div>
    </div>

@endsection