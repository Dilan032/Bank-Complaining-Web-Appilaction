@extends('layouts.superAdminLayout')
@section('SuperAdminContent')

<div class="d-flex justify-content-between mt-3">
    <p class="fs-3 fw-bold">
        {{$oneMessage->bank->bank_name}} Message
        {{-- <span class="badge text-bg-dark">{{$oneMessage->user->user_type}}</span> 
        {{$oneMessage->user->name}}'s message of 
        <span class="bg-dark-subtle p-1 px-2">{{$oneMessage->bank->bank_name}}</span> |
        <small class="bg-dark-subtle p-1 px-2">{{$oneMessage->bank->bank_address}}</small> --}}
    </p>  
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

        <div class="d-grid gap-2 d-flex justify-content-end mt-3 mb-4">
            <form action="{{ route('superAdmin.problem.resolved.or.not', $oneMessage->id ) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="solved">
                <button class="btn btn-success me-2 me-md-2 btn-sm" type="submit" onclick="return confirm('A text message will also be sent to the bank');">Problem Resolved</button>
            </form>

            <form action="{{ route('superAdmin.problem.resolved.or.not', $oneMessage->id ) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="not resolved">
                <button class="btn btn-warning me-4 btn-sm" type="submit" onclick="return confirm('Problem Not Resolved');">Problem Not Resolved</button> 
            </form>
        </div>

      
<section class="container">
    <div class="table-responsive">
        <table class="table table-borderless rounded messageBG">
            <thead>
              <tr>
                <th colspan="4" class="fs-4">
                    {{-- <span class="fw-normal">Subject:</span>  --}}
                    {{-- <span class="badge text-bg-secondary">Urgent</span>  --}}
                    {{$oneMessage->subject}}
                </th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
                <th colspan="4" class="bg-primary-subtle">
                    @if ( $oneMessage->status == 'not resolved')
                        status  <span class="badge text-bg-warning py-2">{{$oneMessage->status}}</span> ||
                    @else
                        status  <span class="badge text-bg-success py-2">{{$oneMessage->status}}</span> ||
                    @endif
                  
                    @if ($oneMessage->request == 'pending')
                        request  <span class="badge text-bg-warning py-2">{{$oneMessage->request}}</span>
                    @elseif ( $oneMessage->request == 'accept')
                        request  <span class="badge text-bg-success py-2">{{$oneMessage->request}}</span>
                    @elseif ( $oneMessage->request == 'reject')
                        request  <span class="badge text-bg-danger py-2">{{$oneMessage->request}}</span>
                    @endif
                  
                </th>
              </tr>
              <tr>
                <td colspan="4"><b class="fs-5">message :</b> <br> {{$oneMessage->message}}</td>
              </tr>
            </tbody>
          </table>
    
            <div class="text-end me-2 fw-bold">
                <p>Created_at : <span class="badge text-bg-info"> {{ \Carbon\Carbon::parse($oneMessage->created_at)->format('d M Y ') }}</span>
                time : <span class="badge text-bg-info"> {{ \Carbon\Carbon::parse($oneMessage->created_at)->format('h:i A') }}</span></p>
            </div>
    </div>
    
          
    
          <!-- Thumbnail Images -->
          <div class="container mt-4 mb-5">
            <p class="fw-bold">Pictures of the problem areas :</p>
            <div class="p-3 mb-2 bg-primary-subtle text-secondary-emphasis problemImageMainBG rounded">
                <div class="row d-flex justify-content-center mx-auto">
                    <div class="col-md-2 py-2">
                        <img src="{{ asset('images/MessageWithProblem/'.$oneMessage-> img_1) }}" alt="empty" class="img-thumbnail problemImage ionHover" data-toggle="modal" data-target="#imageModal1">
                    </div>
                    <div class="col-md-2 py-2">
                        <img src="{{ asset('images/MessageWithProblem/'.$oneMessage-> img_2) }}" alt="empty" class="img-thumbnail problemImage ionHover" data-toggle="modal" data-target="#imageModal2">
                    </div>
                    <div class="col-md-2 py-2">
                        <img src="{{ asset('images/MessageWithProblem/'.$oneMessage-> img_3) }}" alt="empty" class="img-thumbnail problemImage ionHover" data-toggle="modal" data-target="#imageModal3">
                    </div>
                    <div class="col-md-2 py-2">
                        <img src="{{ asset('images/MessageWithProblem/'.$oneMessage-> img_4) }}" alt="empty" class="img-thumbnail problemImage ionHover" data-toggle="modal" data-target="#imageModal4">
                    </div>
                    <div class="col-md-2 py-2">
                        <img src="{{ asset('images/MessageWithProblem/'.$oneMessage-> img_5) }}" alt="empty" class="img-thumbnail problemImage ionHover" data-toggle="modal" data-target="#imageModal5">
                    </div>
                </div>
            </div>
        </div>
    
    
         <!-- Modals -->
         <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                  <div class="modal-body">
                      <img src="{{ asset('images/MessageWithProblem/'.$oneMessage-> img_1) }}" alt="Full Image 1" class="img-fluid">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
    
      <div class="modal fade" id="imageModal2" tabindex="-1" aria-labelledby="imageModalLabel2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                  <div class="modal-body">
                      <img src="{{ asset('images/MessageWithProblem/'.$oneMessage-> img_2) }}" alt="Full Image 2" class="img-fluid">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
    
      <div class="modal fade" id="imageModal3" tabindex="-1" aria-labelledby="imageModalLabel3" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                  <div class="modal-body">
                      <img src="{{ asset('images/MessageWithProblem/'.$oneMessage-> img_3) }}" alt="Full Image 3" class="img-fluid">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
    
      <div class="modal fade" id="imageModal4" tabindex="-1" aria-labelledby="imageModalLabel4" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                  <div class="modal-body">
                      <img src="{{ asset('images/MessageWithProblem/'.$oneMessage-> img_4) }}" alt="Full Image 4" class="img-fluid">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
    
      <div class="modal fade" id="imageModal5" tabindex="-1" aria-labelledby="imageModalLabel5" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                  <div class="modal-body">
                      <img src="{{ asset('images/MessageWithProblem/'.$oneMessage-> img_5) }}" alt="Full Image 5" class="img-fluid">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
</section>

<hr>

{{-- bank Details --}}
<div class="container">
    <div class="row mb-5 mt-5 px-3 d-flex justify-content-evenly">
        <div class="col-md-6">
            <h4>Bank Details</h4>
            <p>
                <div class="p-1 mb-1 bg-white text-dark rounded shado">
                    Bank Name : <b>{{$oneMessage->bank->bank_name}}</b>
                </div>
                <div class="p-1 mb-1 bg-white text-dark rounded shado">
                    Bank Address : <b>{{$oneMessage->bank->bank_address}}</b>
                </div>
                <div class="p-1 mb-1 bg-white text-dark rounded shado">
                    Bank Contact Number : <b>{{$oneMessage->bank->bank_contact_num}}</b>
                </div>
                <div class="p-1 mb-1 bg-white text-dark rounded shado">
                    Bank Email : <b>{{$oneMessage->bank->email}}</b>
                </div>
            </p>
        </div>
        <div class="col-md-6">
            <h4 class="mt-5 mt-md-0">Message Sender Details</h4>
            <p>
                <div class="p-1 mb-1 bg-white text-dark rounded shado">
                    Name : <b>{{$oneMessage->user->name}}</b>
                </div>
                <div class="p-1 mb-1 bg-white text-dark rounded shado">
                    Contact Number : <b> {{$oneMessage->user->user_contact_num}}</b>
                </div>
                <div class="p-1 mb-1 bg-white text-dark rounded shado">
                    Email : <b>{{$oneMessage->user->email}}</b>
                </div>
            </p>
        </div>
    </div>
</div>

@endsection