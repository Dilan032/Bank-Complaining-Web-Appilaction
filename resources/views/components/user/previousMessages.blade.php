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
<div class="p-3 mb-3 bg-white text-dark">
    <div class="text-center">
        <div class="row">
            <div class="col-12 col-sm-auto col-md-1">
                <span class="">02</span>
            </div>
            <div class="col-12 col-sm-auto col-md-4">
                <span class="">kur</span>
            </div>
            <div class="col-12 col-sm-auto col-md-3">
                <span class="">Subject</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="badge text-bg-success p-2">solved</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="badge text-bg-success p-2">accept</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="">2022.08.06</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <!-- Button trigger modal -->
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="p-3 mb-2 bg-white text-dark">
    <div class="text-center">
        <div class="row">
            <div class="col-12 col-sm-auto col-md-1">
                <span class="">02</span>
            </div>
            <div class="col-12 col-sm-auto col-md-4">
                <span class="">kur</span>
            </div>
            <div class="col-12 col-sm-auto col-md-3">
                <span class="">Subject</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="badge text-bg-warning p-2">not resolved</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="badge text-bg-info p-2">pendin</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <span class="">2022.08.06</span>
            </div>
            <div class="col-12 col-sm-auto col-md-1">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</button>
                </div>
            </div>
        </div>
    </div>
</div>



  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">resolved or Not</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="font-monospace">M-id | Bank Name <br> Address</p>
            <div class="mb-4">
                <span class="badge text-bg-info p-2">pendin</span>
                <span class="badge text-bg-warning p-2">urgent</span>
            </div>
            <p><b>Subject</b></p>
            <p>Problem</p>
            <hr>
            <img src="..." class="img-fluid img-thumbnail" alt="...">
            <img src="..." class="img-thumbnail" alt="...">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
