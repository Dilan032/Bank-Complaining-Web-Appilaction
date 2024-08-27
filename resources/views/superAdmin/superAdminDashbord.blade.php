@extends('layouts.superAdminLayout')
@section('SuperAdminContent')

<div class="container d-flex justify-content-between">
    <div class="fs-1">Dashbord</div>
</div>

<hr class="me-3">


<div class="row">
    <div class="col-md-8">
        
        <div class="row bg-primary-subtle border-bottom border-black border-5 rounded shado">
            <p class="fs-4 p-1">Registered Banks <span class="badge text-bg-light px-5 problemImageMainBG">{{ $Numusers }}</span></p>
        </div>
        {{-- start new row --}}
        <div class="row mt-3 bg-warning-subtle border-bottom border-black border-5 rounded shado">
            <div class="col-md-6">
                <div class="p-2">
                    <p class="fs-4">All Messages <span class="badge text-bg-light px-5 problemImageMainBG">{{ $NumMsg }}</span></p>
                    <div class="fs-5 p-3 bg-white text-dark  rounded shado">
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
                <div class="p-2">
                    <p class="fs-4"><span class="badge text-warning">.</span></p>
                    <div class="fs-5 p-3 bg-white text-dark  rounded shado">
                        <div class="d-flex justify-content-between px-4 mt-2">
                            ⚙ Processing
                            <span class="badge text-bg-dark px-5">{{ $NumMsgProcessing }}</span>
                        </div>
                        <div class="d-flex justify-content-between px-4 mt-2">
                            👁 Viewed 
                            <span class="badge text-bg-info px-5">{{ $NumMsgSeen }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end new row --}}

        {{-- new row --}}
        <div class="p-2 mt-4 bg-primary-subtle border-bottom border-black border-5 rounded shado">
            <p class="fs-4">Registered users <span class="badge text-bg-light px-5 problemImageMainBG">{{ $Numusers }}</span></p>
            <div class="fs-5 d-flex flex-column flex-sm-row gap-4">
                <div class="p-3 w-100 w-sm-50 bg-white text-dark rounded rounded shado">
                    <b>Administrators</b>
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🙋‍♂️Active
                        <span class="badge text-bg-primary px-5 shado">{{ $NumActiveAdministrators }}</span>
                    </div>
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🙇‍♂️Inactive
                        <span class="badge text-bg-secondary px-5 shado">{{ $NumAdministrators - $NumActiveAdministrators }}</span>
                    </div>
                </div>

                <div class="fs-5 p-3 w-100 w-sm-50 bg-white text-dark rounded rounded shado">
                    <b>Users</b> 
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🙋‍♂️Active
                        <span class="badge text-bg-primary px-5 shado">{{ $NumActiveUsers }}</span>
                    </div>
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🙇‍♂️Inactive
                        <span class="badge text-bg-secondary px-5 shado">{{ $NumUsers - $NumActiveUsers }}</span>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <div class="col-md-4">
        <div class="mb-5">
            <h4 class="mt-4">Super Admin Details</h4>
            @foreach ($superAdmin as $admin )
            <div class="col-md-12 mt-4">
                <p>
                    <div class="p-1 mb-1 bg-white text-dark rounded shado">
                        👨‍💼User name : <b>{{ $admin->name }}</b>
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


{{-- first row end --}}
</div>




@endsection