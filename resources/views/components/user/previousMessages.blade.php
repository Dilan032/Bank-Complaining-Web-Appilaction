<div class="p-2 mb-3 bg-black text-white">
    <div class="text-center d-none d-sm-inline">
        <div class="row">
            <div class="col-12 col-sm-auto col-md-1">
                <span class="">m-id</span>
            </div>
            <div class="col-12 col-sm-auto col-md-4">
                <span class="">address</span>
            </div>
            <div class="col-12 col-sm-auto col-md-3">
                <span class="">Subject</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="">Status</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="">request</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="">date</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="">Action</span>
            </div>
        </div>
    </div>
</div>

{{-- start message content --}}
<div class="p-3 mb-3 bg-white text-dark messageBG rounded">
    <div class="text-center">
        @foreach ($previousMessages as $msg)
            {{-- @foreach ($bank as $bankDetail) --}}
        <div class="row">
            <div class="col-12 col-sm-auto col-md-1">
               
                    <span class="">{{ $msg->id }}</span>  
                
            </div>
            <div class="col-12 col-sm-auto col-md-4">
                    {{$msg->bank_id}}
                    {{-- <span class="">{{$bankDetail->bank_address}}</span> --}}
                
            </div>
            <div class="col-12 col-sm-auto col-md-3">
              
                    <span class="">{{ $msg->subject }}</span>  
               
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                
                    <span class="">{{ $msg->status }}</span>  
               
            </div>
            <div class="col-12 col-sm-auto col-md-1">
               
                    <span class="">{{ $msg->request }}</span>  
               
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="">-----</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <!-- Button trigger modal -->
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</button>
                </div>
            </div>
        </div>
            {{-- @endforeach --}}
        @endforeach
    </div>
</div>
