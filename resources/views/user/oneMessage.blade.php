@extends('layouts.userLayout')
@section('userContent')


<div class="p-3 mb-5 bg-black text-white text-center">
  <span class="fs-3">Message sent by {{$messagesTableDataUser->user->name}}  {{$messagesTableDataUser->bank}}</span>
</div>


<div class="table-responsive">
    <table class="table table-borderless rounded messageBG">
        <thead>
          <tr>
            <th colspan="4" class="fs-2">
                <span class="fw-normal">Subject:</span> 
                {{-- <span class="badge text-bg-secondary">Urgent</span>  --}}
                {{$oneMessage->subject}}
            </th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <tr>
            <th colspan="4" class="bg-secondary-subtle">
              status  <span class="badge text-bg-warning">{{$oneMessage->status}}</span> ||
              request  <span class="badge text-bg-warning">{{$oneMessage->request}}</span>
            </th>
          </tr>
          <tr>
            <td colspan="4"><b class="fs-5">message :</b> <br> {{$oneMessage->message}}</td>
          </tr>
        </tbody>
      </table>

      <div class="text-end me-2 fw-bold">
        <p>Created_at : <span class="badge text-bg-info"> {{ \Carbon\Carbon::parse($oneMessage->created_at)->format('d M Y ') }}</span>
           Created_time : <span class="badge text-bg-info"> {{ \Carbon\Carbon::parse($oneMessage->created_at)->format('h:i A') }}</span></p>
      </div>

  </div>

      

      <!-- Thumbnail Images -->
      <div class="container mt-4 mb-5">
        <p class="fw-bold">Pictures of the problem areas :</p>
        <div class="p-3 mb-2 bg-secondary-subtle text-secondary-emphasis problemImageMainBG rounded">
        <div class="row d-flex justify-content-center">
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



@endsection