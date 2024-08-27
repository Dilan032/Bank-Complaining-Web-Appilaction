@extends('layouts.superAdminLayout')
@section('SuperAdminContent')
    
<div class="container d-flex justify-content-between">
    <div class="fs-1">message</div>
</div>

<hr class="me-3">

    <!-- Display validation errors -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ $error }}",
                });
            </script>
        @endforeach
    @endif

    @if (session('success'))
    <script>
        Swal.fire({
        icon: "success",
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 3000
        });
    </script>
    @endif



    <div class="row mt-3 mb-4 d-flex justify-content-center">
        <div class="col-md-10">
            <div class="p-2 bg-warning-subtle border-bottom border-black border-5 rounded shado">
               
                <div class="text-center">
                    <p><i class="bi bi-envelope-check fs-1"></i></p>
                    <p class="fs-4">All Messages <span class="badge text-bg-light px-5 problemImageMainBG">{{$solvedMessageCount + $noSolvedMessageCount + $seenMessageCount + $processingMessageCount}}</span></p>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-md-5">
                        <div class="p-3 bg-white text-dark  rounded">
                            <div class="d-flex justify-content-between px-4 mt-2">
                                ✔ Solved
                                <span class="badge text-bg-success px-5">{{$solvedMessageCount}}</span>
                            </div>
                            <div class="d-flex justify-content-between px-4 mt-2">
                                ❌ Not Solved
                                <span class="badge text-bg-warning px-5">{{$noSolvedMessageCount}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="p-3 bg-white text-dark  rounded">
                            <div class="d-flex justify-content-between px-4 mt-2">
                                👁 Viewed
                                <span class="badge text-bg-info px-5">{{$seenMessageCount}}</span>
                            </div>
                            <div class="d-flex justify-content-between px-4 mt-2">
                                ⚙ processing
                                <span class="badge text-bg-dark px-5">{{$processingMessageCount}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                

            </div>
        </div>
    </div>
    


<section class="container ">
    <div class="p-2 mb-3 bg-black text-white">
        <div class="text-center d-none d-sm-inline">
            <div class="row">
                <div class="col-12 col-sm-auto col-md-2">
                    <span class="">date</span>
                </div>
                <div class="col-12 col-sm-auto col-md-1">
                    <span class="">Status</span>
                </div>
                <div class="col-12 col-sm-auto col-md-2">
                    <span class="">Bank Name</span>
                </div>
                <div class="col-12 col-sm-auto col-md-3">
                    <span class="">Bank Address</span>
                </div>
                <div class="col-12 col-sm-auto col-md-3">
                    <span class="">Subject</span>
                </div>
                <div class="col-12 col-sm-auto col-md-1">
                    <span class="">Action</span>
                </div>
            </div>
        </div>
    </div>

    {{-- in mobile view show this title --}}
    <div class="fs-4 fw-bold text-center mb-4">
        <p class="d-inline d-sm-none">All Bank Messages</p>
    </div>

    @if (!empty($messagesAndBank))
    @foreach ($messagesAndBank as $oneMessage)
    {{-- start message content --}}
    <div class="p-3 mb-3 bg-primary-subtle text-dark messageBG rounded">
        <div class="text-center">
            <div class="row">
                <div class="col-12 col-sm-auto col-md-2">
                    <span class="font-monospace"><small>{{ \Carbon\Carbon::parse($oneMessage->created_at)->format('Y M d') }}</small></span>
                </div>
                <div class="col-12 col-sm-auto col-md-1">
                    @if ( $oneMessage->status == 'not resolved')
                        <span class="badge text-bg-warning py-2">{{$oneMessage->status}}</span>
                    @elseif ( $oneMessage->status == 'solved')
                        <span class="badge text-bg-success py-2 px-4">{{$oneMessage->status}}</span>
                    @elseif ($oneMessage->status == 'Processing')
                        <span class="badge text-bg-dark py-2">{{$oneMessage->status}}</span>
                    @else
                        <span class="badge text-bg-info text-white py-2 px-4">{{$oneMessage->status}}</span>
                    @endif     
                </div>
                <div class="col-12 col-sm-auto col-md-2">
                    <span class=""></span>{{ $oneMessage->bank->bank_name }}                  
                </div>
                <div class="col-12 col-sm-auto col-md-3">
                    <span class=""></span>{{ $oneMessage->bank->bank_address }}                  
                </div>
                <div class="col-12 col-sm-auto col-md-3">
                        <span class="">{{ $oneMessage->subject }}</span>  
                </div>
                <div class="col-12 col-sm-auto col-md-1">
                    <!-- Button trigger modal -->
                    <div class="d-grid gap-2 btnShado">
                        <a href="{{route('superAdmin.one.messages.view', $oneMessage->id)}}" class="btn btn-primary btn-sm" type="button">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
        <p>No messages found</p>
    @endif
</section>


@endsection