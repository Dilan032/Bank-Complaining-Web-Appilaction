@extends('layouts.superAdminLayout')
@section('SuperAdminContent')

<div class="container d-flex justify-content-between">
    <div class="fs-1">Dashbord</div>
</div>

<hr class="me-3">


<div class="row">
    <div class="col-md-12">
        

        {{-- start new row --}}
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="p-2 bg-warning-subtle text-primary-emphasis border-bottom border-black border-5 rounded btnShado">
                    
                    <p class="fs-4">All Messages <span class="badge text-bg-light px-5 problemImageMainBG">{{ $NumMsg }}</span></p>
                    <div class="p-3 bg-white text-dark  rounded btnShado">
                        <div class="d-flex justify-content-between px-4 mt-2">
                            ✔solved
                            <span class="badge text-bg-success px-5">{{ $NumMsgSolved }}</span>
                        </div>
                        <div class="d-flex justify-content-between px-4 mt-2">
                            ❌not solved
                            <span class="badge text-bg-warning px-5">{{ $NumMsgNotSolved }}</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="p-2 bg-warning-subtle text-primary-emphasis border-bottom border-black border-5 rounded btnShado">
                    
                    <p class="fs-4">Registered Banks <span class="badge text-bg-light px-5 problemImageMainBG">{{ $NumBanks }}</span></p>
                    <div class="p-3 bg-white text-dark  rounded btnShado">
                        <div class="d-flex justify-content-between px-4 mt-2">
                            🏛 Active
                            <span class="badge text-bg-primary px-5">{{ $NumBanks }}</span>
                        </div>
                        <div class="d-flex justify-content-between px-4 mt-2">
                            🚧 Inactive
                            <span class="badge text-bg-secondary px-5">-</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- end new row --}}

        {{-- new row --}}
        <div class="p-3 mb-2 mt-4 bg-primary-subtle text-danger-emphasis border-bottom border-black border-5 rounded shado">
            <p class="fs-4">Registered users <span class="badge text-bg-light px-5 problemImageMainBG">{{ $Numusers }}</span></p>
            <div class="d-flex flex-column flex-sm-row gap-3">
                
                <div class="p-3 w-100 w-sm-50 bg-white text-dark rounded rounded">
                    <b>Administrators</b>
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🙋‍♂️Active
                        <span class="badge text-bg-primary px-5">{{ $NumActiveAdministrators }}</span>
                    </div>
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🙇‍♂️Inactive
                        <span class="badge text-bg-secondary px-5">{{ $NumAdministrators - $NumActiveAdministrators }}</span>
                    </div>
                </div>

                <div class="p-3 w-100 w-sm-50 bg-white text-dark rounded rounded">
                    <b>Users</b> 
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🙋‍♂️Active
                        <span class="badge text-bg-primary px-5">{{ $NumActiveUsers }}</span>
                    </div>
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🙇‍♂️Inactive
                        <span class="badge text-bg-secondary px-5">{{ $NumUsers - $NumActiveUsers }}</span>
                    </div>
                </div>

            </div>
        </div>

        {{-- new row --}}
        <div class="container">
            <div class="row mb-5 mt-4">
                <h4>Super Admin Details</h4>
                @foreach ($superAdmin as $admin )
                <div class="col-md-6">
                    <p>
                        <div class="p-1 mb-1 bg-white text-dark rounded shado">
                            User Name : <b>{{ $admin->name }}</b>
                        </div>
                        <div class="p-1 mb-1 bg-white text-dark rounded shado">
                            Email : <b>{{ $admin->email }}</b>
                        </div>
                        <div class="p-1 mb-1 bg-white text-dark rounded shado">
                            Tp : <b>{{ $admin->user_contact_num }}</b>
                        </div>
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    {{-- col end --}}

    </div>

    {{-- <div class="col-md-4">
        <img src="{{ asset('images/CompanyLogo/nanosoftSolutions Company Logo.png') }}" alt="NanosoftSolutions Logo">
                <p class="fw-bold">Bank Complaning Web Application</p>
        <div class="p-1 mt-3 border border-primary rounded problemImageMainBG btnShado">
            <div class="p-2 mb-1 bg-white text-dark rounded btnShado">
                <br><br>
                <img class="img-thumbnail" src="{{ asset('images/nanosoft.JPG') }}" alt="NanosoftSolutions Logo">
                <br><br>
            </div>
        </div>
    </div> --}}


{{-- first row end --}}
</div>




@endsection