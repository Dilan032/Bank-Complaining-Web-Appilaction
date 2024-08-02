<div class="row mb-5 d-flex justify-content-center"">
    <div class="col-md-5">
        <div class="bg-body-secondary border border-3 rounded p-3 m-5 mb-2">
            <span class="fs-4">Administrators</span> <br>
            All - [ {{$activeAdministratorCount + $inactiveAdministratorCount}} ] <br>
            Active  - [ {{$activeAdministratorCount}} ] <br>
            Inactive  - [ {{$inactiveAdministratorCount}} ] <br> 
        </div>
    </div>
    <div class="col-md-5">
        <div class="bg-body-secondary border border-3 rounded p-3 m-5 mb-2">
            <span class="fs-4">Employees</span> <br>
            All  [ {{$activeUserCount + $inactiveUserCount}} ] <br> 
            Active  [ {{$activeUserCount}} ] <br> 
            Inactive  [ {{$inactiveUserCount}} ] <br> 
        </div>
    </div>
</div>