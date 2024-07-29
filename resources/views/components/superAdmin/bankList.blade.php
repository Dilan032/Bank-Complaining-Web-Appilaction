<div class="text-center mt-4">
    <span class="fs-2">Bank List</span>
</div>
<div class="px-2 mt-3 mb-4">
    <div class="p-3 mb-2 bg-primary-subtle text-primary-emphasis rounded">
        <div class="d-flex justify-content-between">
            <div>
                id
            </div>
            <div>
                Bank 1
            </div>
            <div>
                <button class="btn btn-primary btn-sm">View</button>
            </div>
        </div>
    </div>
    <div class="p-3 mb-2 bg-primary-subtle text-primary-emphasis rounded">
        <div class="d-flex justify-content-between">
            <div>
                id
            </div>
            <div>
                Bank 2
            </div>
            <div>
                <button class="btn btn-primary btn-sm">View</button>
            </div>
        </div>
    </div>
    <div class="p-3 mb-2 bg-danger-subtle text-danger-emphasis rounded">
        <div class="d-flex justify-content-between">
            <div>
                id
            </div>
            <div>
                Bank 3
            </div>
            <div>
                <button class="btn btn-primary btn-sm">View</button>
            </div>
        </div>
    </div>
    <div class="p-3 mb-2 bg-primary-subtle text-primary-emphasis rounded">
        <div class="d-flex justify-content-between">
            <div>
                id
            </div>
            <div>
                Bank 4
            </div>
            <div>
                <button class="btn btn-primary btn-sm">View</button>
            </div>
        </div>
    </div>

</div>


{{-- bank details model --}}
  
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Bank Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          bank id : 125 <br>
          bank name : bank 1 <br>
          <hr>
          adminitrators : 1 <br>
          amal : <button type="button" class="btn btn-primary btn-sm">View</button> <br>
          amal santha : <button type="button" class="btn btn-primary btn-sm">View</button> <br>
          <hr>
          Users : 10 <br>
          sirimal : <button type="button" class="btn btn-primary btn-sm">View</button> <br>
          sirimal : <button type="button" class="btn btn-primary btn-sm">View</button> <br>
          sirimal : <button type="button" class="btn btn-primary btn-sm">View</button> <br>
          sirimal : <button type="button" class="btn btn-primary btn-sm">View</button> <br>
          sirimal : <button type="button" class="btn btn-primary btn-sm">View</button> <br>
          sirimal : <button type="button" class="btn btn-primary btn-sm">View</button> <br>
          sirimal : <button type="button" class="btn btn-primary btn-sm">View</button> <br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"> Cancel</button>
          <button class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Delete Bank Account</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">warning !</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure to delete this bank account ?
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to Bank Details</button>
          <button class="btn btn-danger" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Delete Account</button>
        </div>
      </div>
    </div>
  </div>
  