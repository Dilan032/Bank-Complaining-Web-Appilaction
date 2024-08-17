
    
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="p-1 bg-primary-subtle text-primary-emphasis border-bottom border-black border-3 rounded">
                <p class="fs-4 text-center">
                    All Bank Employess 
                    <span class="badge text-bg-light px-5 problemImageMainBG">{{$activeAdministratorCount + $inactiveAdministratorCount + $activeUserCount + $inactiveUserCount}}</span>
                </p>
            </div>
        </div>
    </div>
    

    <div class="row mt-3 mb-2 d-flex justify-content-center">
        <div class="col-md-4">
            <div class="p-2 bg-primary-subtle text-primary-emphasis border-bottom border-black border-5 rounded shado">
                
                <p class="fs-4">All Bank Administrators <span class="badge text-bg-light px-5 problemImageMainBG">{{$activeAdministratorCount + $inactiveAdministratorCount}}</span></p>
                <div class="p-3 bg-white text-dark  rounded">
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🙋‍♂️Active
                        <span class="badge text-bg-primary px-5">{{$activeAdministratorCount}}</span>
                    </div>
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🙇‍♂️Inactive
                        <span class="badge text-bg-secondary px-5">{{$inactiveAdministratorCount}}</span>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="p-2 bg-primary-subtle text-primary-emphasis border-bottom border-black border-5 rounded shado">
                
                <p class="fs-4">All Bank Users <span class="badge text-bg-light px-5 problemImageMainBG">{{$activeUserCount + $inactiveUserCount}}</span></p>
                <div class="p-3 bg-white text-dark  rounded">
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🙋‍♂️Active
                        <span class="badge text-bg-primary px-5">{{$activeUserCount}}</span>
                    </div>
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🙇‍♂️Inactive
                        <span class="badge text-bg-secondary px-5">{{$inactiveUserCount}} </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
