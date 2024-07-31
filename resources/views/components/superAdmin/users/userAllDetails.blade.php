<div class="d-flex justify-content-evenly mt-5 mb-5 text-center px-auto">
    <div class="p-3 bg-primary bg-opacity-10 border border-primary">
        All Administrators <br> [ {{$activeAdministratorCount + $inactiveAdministratorCount}} ]
    </div>
    <div class="p-3 bg-primary bg-opacity-10 border border-primary">
        Active Administrators <br> 
        [ {{$activeAdministratorCount}} ]
    </div>
    <div class="p-3 bg-danger bg-opacity-10 border border-danger">
        Inactive Administrators <br>
       [ {{$inactiveAdministratorCount}} ]
    </div>
    <div class="p-3 bg-primary bg-opacity-10 border border-primary">
        All Users <br> 
        [ {{$activeUserCount + $inactiveUserCount}} ]
    </div>
    <div class="p-3 bg-primary bg-opacity-10 border border-primary">
        Active Users <br> 
        [ {{$activeUserCount}} ]
    </div>
    <div class="p-3 bg-danger bg-opacity-10 border border-danger">
        Inactive Users <br> 
        [ {{$inactiveUserCount}} ]
    </div>
</div>


