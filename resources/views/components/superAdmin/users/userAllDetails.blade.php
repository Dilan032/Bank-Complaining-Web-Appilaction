<div class="row mb-5 d-flex justify-content-center"">
    <div class="col-md-5">
        <div class="bg-body-secondary border border-3 rounded p-3 m-5 mb-2">
            <span class="fs-4">Administrators</span> <br>
            All <span class="badge text-bg-light fs-6"> {{$activeAdministratorCount + $inactiveAdministratorCount}} </span> <br>
            Active <span class="badge text-bg-light fs-6"> {{$activeAdministratorCount}} </span> <br>
            Inactive <span class="badge text-bg-light fs-6"> {{$inactiveAdministratorCount}} </span> <br> 
        </div>
    </div>
    <div class="col-md-5">
        <div class="bg-body-secondary border border-3 rounded p-3 m-5 mb-2">
            <span class="fs-4">Employees</span> <br>
            All <span class="badge text-bg-light fs-6"> {{$activeUserCount + $inactiveUserCount}} </span> <br> 
            Active <span class="badge text-bg-light fs-6"> {{$activeUserCount}} </span> <br> 
            Inactive <span class="badge text-bg-light fs-6"> {{$inactiveUserCount}} </span> <br> 
        </div>
    </div>
</div>