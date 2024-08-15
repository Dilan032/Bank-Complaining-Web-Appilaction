@extends('layouts.administratorLayout')
@section('administratorContent')


<div class="d-flex justify-content-between">
    <div class="fs-1">message</div>
</div>



<hr class="me-3">

<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3 mb-4">
    <button class="btn btn-primary mt-3 btnShado" type="button" data-toggle="modal" data-target="#messageModel">Write a message to Nanosoft Solution Company</button>
</div>
    

<!-- Modals -->
<div class="modal fade" id="messageModel" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="alert alert-warning font-monospace text-center" role="alert">
    <small>It is the manager's responsibility to confirm or reject messages. 
        After confirming the message, Nanosoft Solutions will receive the message.</small>
</div>


<section class="mt-3">
    <div class="p-2 mb-3 bg-black text-white">
        <div class="text-center d-none d-sm-inline">
            <div class="row">
                <div class="col-12 col-sm-auto col-md-1">
                    <span class="">m-id</span>
                </div>
                <div class="col-12 col-sm-auto col-md-6">
                    <span class="">Subject</span>
                </div>
                <div class="col-12 col-sm-auto col-md-1">
                    <span class="">Status</span>
                </div>
                <div class="col-12 col-sm-auto col-md-1">
                    <span class="">request</span>
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
    
    @if (!empty($messages))
    @foreach ($messages as $oneMessage)
    {{-- start message content --}}
    <div class="p-3 mb-3 bg-white text-dark messageBG rounded">
        <div class="text-center">
            <div class="row">
                <div class="col-12 col-sm-auto col-md-1">
                    <span class="d-inline d-sm-none">M-id </span>{{ $oneMessage->id }}                  
                </div>
                <div class="col-12 col-sm-auto col-md-6">
                        <span class="">{{ $oneMessage->subject }}</span>  
                </div>
                <div class="col-12 col-sm-auto col-md-1">
                    @if ($oneMessage->status == 'solved')
                        <span class="badge text-bg-success py-1">{{ $oneMessage->status }}</span>
                    @else
                        <span class="badge text-bg-warning py-1">{{ $oneMessage->status }}</span>
                    @endif      
                </div>
                <div class="col-12 col-sm-auto col-md-1">
                    @if ( $oneMessage->request == 'accept')
                        <span class="badge text-bg-success py-1">{{ $oneMessage->request }}</span>     
                    @elseif ($oneMessage->request == 'reject')    
                        <span class="badge text-bg-danger py-1">{{ $oneMessage->request }}</span>
                    @else
                        <span class="badge text-bg-warning py-1">{{ $oneMessage->request }}</span>
                    @endif
                </div>
                <div class="col-12 col-sm-auto col-md-2">
                    <span class="font-monospace"><small>{{ \Carbon\Carbon::parse($oneMessage->created_at)->format('d M Y') }}</small></span>
                </div>
                <div class="col-12 col-sm-auto col-md-1">
                    <!-- Button trigger modal -->
                    <div class="d-grid gap-2 btnShado">
                        <a href="{{route('oneMessageForAdministrator.show', $oneMessage->id)}}" class="btn btn-primary" type="button">View</a>
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