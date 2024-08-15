@extends('layouts.administratorLayout')
@section('administratorContent')


<div class="d-flex justify-content-between">
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

<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3 mb-4">
    <button class="btn btn-primary mt-3 btnShado" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Write a message to Nanosoft Solution Company</button>
</div>
    
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Put the problem here to sent</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <div class="row">
                <div class="col-md-8">
                    <form action="{{route('administrator.messages.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="bank_id" value="{{$user = Auth::user()->bank_id;}}">
                        <input type="hidden" name="request" value="accept">

                        <div class="form-floating mb-3">
                            <input type="text" name="subject" value="{{old('subject')}}" class="form-control" id="floatingInput" placeholder="Subject">
                            <label for="floatingInput">Subject</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" name="message" value="{{old('message')}}" placeholder="Message" id="floatingTextarea2" style="height: 250px"></textarea>
                            <label for="floatingTextarea2">Message</label>
                        </div>

                        <div class="d-grid gap-2 mx-auto mt-4">
                            <button class="btn btn-primary" type="submit">Send Message</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                </div>


                <div class="col-md-4">
                    <br> <br> <br>
                    <div class="text-center mb-3 mt-4">
                        <h3 class="fw-normal">Upload Images</h3>
                        <span class="font-monospace"><small>(Upload pictures where there are problems)</small></span>
                    </div>

                    <div class="d-flex justify-content-around">
                        <section>
                            <div class="bg-white  rounded p-2 imgBg">
                                <label for="file_1" class="ionHover">
                                    <i class="bi bi-upload fs-1"></i>
                                </label>
                                <input type="file" class="d-none" name="img_1" id="file_1">
                            </div>
                            {{-- this style for when image file uploaded show that file uploaded or not --}}
                            <div class="ms-4 mt-2">
                                <div class="spinner-border spinner-border-sm" id="spinner_1" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <i class="bi bi-check-circle checkmark" id="checkmark_1"></i>
                            </div>
                        </section>

                        <section>
                            <div class="bg-white  rounded p-2 imgBg">
                                <label for="file_2" class="ionHover">
                                    <i class="bi bi-upload fs-1"></i>
                                </label>
                                <input type="file" class="d-none" name="img_2" id="file_2">
                            </div>
                            {{-- this style for when image file uploaded show that file uploaded or not --}}
                            <div class="ms-4 mt-2">
                                <div class="spinner-border spinner-border-sm" id="spinner_2" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <i class="bi bi-check-circle checkmark" id="checkmark_2"></i>
                            </div>
                        </section>

                        <section>
                            <div class="bg-white  rounded p-2 imgBg">
                                <label for="file_3" class="ionHover">
                                    <i class="bi bi-upload fs-1"></i>
                                </label>
                                <input type="file" class="d-none" name="img_3" id="file_3">
                            </div>
                            {{-- this style for when image file uploaded show that file uploaded or not --}}
                            <div class="ms-4 mt-2">
                                <div class="spinner-border spinner-border-sm" id="spinner_3" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <i class="bi bi-check-circle checkmark" id="checkmark_3"></i>
                            </div>
                        </section>

                        <section>
                            <div class="bg-white  rounded p-2 imgBg">
                                <label for="file_4" class="ionHover">
                                    <i class="bi bi-upload fs-1"></i>
                                </label>
                                <input type="file" class="d-none" name="img_4" id="file_4">
                            </div>
                            {{-- this style for when image file uploaded show that file uploaded or not --}}
                            <div class="ms-4 mt-2">
                                <div class="spinner-border spinner-border-sm" id="spinner_4" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <i class="bi bi-check-circle checkmark" id="checkmark_4"></i>
                            </div>
                        </section>

                        <section>
                            <div class="bg-white  rounded p-2 imgBg">
                                <label for="file_5" class="ionHover">
                                    <i class="bi bi-upload fs-1"></i>
                                </label>
                                <input type="file" class="d-none" name="img_5" id="file_5">
                            </div>
                            {{-- this style for when image file uploaded show that file uploaded or not --}}
                            <div class="ms-4 mt-2">
                                <div class="spinner-border spinner-border-sm" id="spinner_5" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <i class="bi bi-check-circle checkmark" id="checkmark_5"></i>
                            </div>
                        </section>                    
                    </div>

                </div>
            </div>
        </form>
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