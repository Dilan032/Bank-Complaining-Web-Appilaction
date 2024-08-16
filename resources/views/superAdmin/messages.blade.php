@extends('layouts.superAdminLayout')
@section('SuperAdminContent')
    
<div class="container d-flex justify-content-between">
    <div class="fs-1">message</div>
</div>

<hr class="me-3">

    <!-- Display validation errors -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


<section class="container mt-5">
    <div class="p-2 mb-3 bg-black text-white">
        <div class="text-center d-none d-sm-inline">
            <div class="row">
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
                    <span class="">Status</span>
                </div>
                <div class="col-12 col-sm-auto col-md-2">
                    <span class="">date</span>
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
    <div class="p-3 mb-3 bg-white text-dark messageBG rounded">
        <div class="text-center">
            <div class="row">
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
                    @if ($oneMessage->status == 'solved')
                        <span class="badge text-bg-success px-4 py-1">{{ $oneMessage->status }}</span>
                    @else
                        <span class="badge text-bg-warning py-1">{{ $oneMessage->status }}</span>
                    @endif      
                </div>
                <div class="col-12 col-sm-auto col-md-2">
                    <span class="font-monospace"><small>{{ \Carbon\Carbon::parse($oneMessage->created_at)->format('Y M d') }}</small></span>
                </div>
                <div class="col-12 col-sm-auto col-md-1">
                    <!-- Button trigger modal -->
                    <div class="d-grid gap-2 btnShado">
                        <a href="{{route('superAdmin.one.messages.view', $oneMessage->id)}}" class="btn btn-primary" type="button">View</a>
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