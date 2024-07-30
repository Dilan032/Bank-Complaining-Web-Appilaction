@extends('layouts.superAdminLayout')
@section('SuperAdminContent')

    <h1>users</h1>

    <hr class="me-3">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-4 mx-auto">
                @include('components.superAdmin.users.userAllDetails')
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-2 mx-auto">
                @include('components.superAdmin.users.registerUsers')
            </div>
            <div class="col-md-6 col-sm-10 mx-auto">
                @include('components.superAdmin.Banks.bankList')
            </div>
        </div>
    </div>

@endsection