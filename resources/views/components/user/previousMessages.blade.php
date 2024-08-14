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

@foreach ( $messages as $msg)
{{-- start message content --}}
<div class="p-3 mb-3 bg-white text-dark messageBG rounded">
    <div class="text-center">
        <div class="row">
            <div class="col-12 col-sm-auto col-md-1">
                <span class="d-inline d-sm-none">M-id </span>{{ $msg->id }}                  
            </div>
            <div class="col-12 col-sm-auto col-md-6">
                    <span class="">{{ $msg->subject }}</span>  
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="badge text-bg-warning p-1">{{ $msg->status }}</span>      
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="badge text-bg-info p-1">{{ $msg->request }}</span>               
            </div>
            <div class="col-12 col-sm-auto col-md-2">
                <span class="font-monospace"><small>{{ \Carbon\Carbon::parse($msg->created_at)->format('d M Y') }}</small></span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <!-- Button trigger modal -->
                <div class="d-grid gap-2">
                    <a href="{{route('oneMessageForUser.show', $msg->id)}}" class="btn btn-primary" type="button">View</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
