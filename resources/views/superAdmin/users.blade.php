@extends('layouts.superAdminLayout')
@section('SuperAdminContent')

    <h1>users</h1>

    <hr class="me-3">

    <div class="container-fluid">

        {{-- btn for user registration model --}}
        <div class="d-grid gap-2 mb-4 d-md-flex justify-content-md-end">
            <button class="btn btn-primary me-md-5" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Register Users</button>
        </div>
        {{-- include model --}}
        @include('components.superAdmin.users.registerUsers')
        {{-- end user registration section --}}

        <div class="row">
            <div class="col-md-12 col-sm-4 mx-auto">
                @include('components.superAdmin.users.userAllDetails')
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 col-sm-4 mx-auto">
                @include('components.superAdmin.Banks.bankList')
            </div>
        </div>
       
    </div>

@endsection