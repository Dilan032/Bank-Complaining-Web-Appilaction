
    <div class="row mt-3 mb-2 d-flex justify-content-center">
        <div class="col-md-5">
            <div class="p-2 bg-primary-subtle border-bottom border-black border-5 rounded shado">
               
                <div class="text-center">
                    <p><i class="bi bi-bank2 fs-1"></i></p>
                    <p class="fs-4">All Banks <span class="badge text-bg-light px-5 problemImageMainBG">{{$bankCount}}</span></p>
                </div>

                <div class="p-3 bg-white text-dark  rounded">
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🏛 Active
                        <span class="badge text-bg-primary px-5">{{$activeBankCount}}</span>
                    </div>
                    <div class="d-flex justify-content-between px-4 mt-2">
                        🏗 Inactive
                        <span class="badge text-bg-secondary px-5">{{$inactiveBankCount}}</span>
                    </div>
                </div>

            </div>
        </div>
    </div>



