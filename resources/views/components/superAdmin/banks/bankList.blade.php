<div class="text-center mt-4">
    <span class="fs-2 ms-5">Bank List</span>
</div>


<div class="px-2 mt-3 mb-4">
    <div class="p-2 mb-2 bg-black text-white rounded">
        <div class="d-flex justify-content-between">
            <div>ID | Bank Name</div>
            <div>Address</div>
            <div>View</div>
        </div>
    </div>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        @if ($banks->isNotEmpty())
            @foreach ($banks as $key => $bank)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading{{ $key }}">
                        <button class="accordion-button collapsed d-flex justify-content-between align-items-center bg-primary-subtle text-primary-emphasis rounded" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false" aria-controls="flush-collapse{{ $key }}">
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge text-bg-dark">{{ $bank->id }}</span>
                                    <span class="fw-bold ms-2">{{ $bank->bank_name }}</span>
                                </div> 
                                <div>
                                    {{ $bank->bank_address }}
                                </div>
                                <div></div>
                            </div>
                        </button>                       
                    </h2>
                    <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $key }}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body ">
                            <div class="massage-box-main border border-2 px-4 py-2">
                                <div class="row">
                                    <div class="col fw-bold">
                                        Bank id : <br>
                                        Bank registration done : <br>
                                        Bank Name : <br>
                                        Address : <br>
                                        Email : <br>
                                        Contact Number : <br>
                                    </div>
                                    <div class="col">
                                        <b>{{ $bank->id }}</b> <br>
                                        {{ \Carbon\Carbon::parse($bank->created_at)->format('d M,Y , h:i A') }} <br>
                                        {{ $bank->bank_name }} <br>
                                        {{ $bank->bank_address }} <br>
                                        {{ $bank->email }} <br>
                                        {{ $bank->bank_contact_num }} <br>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col">
                                        <span class="badge text-bg-dark p-2"> Administrators : </span> <br>
                                        @if ($users ->isNotEmpty())
                                            @foreach ($users as $userDetail)
                                                @if ( $userDetail->bank_id == $bank->id && $userDetail->user_type == "administrator")
                                                    {{ $userDetail->name }} <br>
                                                @endif
                                            @endforeach
                                        @endif 
                                    </div>

                                    <div class="col">
                                        <br>

                                         @if ($users ->isNotEmpty())
                                         @foreach ($users as $userDetail)
                                             @if ( $userDetail->bank_id == $bank->id && $userDetail->user_type == "administrator")
                                                 {{ $userDetail->user_contact_num }} <br>
                                             @endif
                                         @endforeach
                                     @endif 
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col">
                                        <span class="badge text-bg-dark p-2"> users : </span> <br>
                                        @if ($users ->isNotEmpty())
                                            @foreach ($users as $userDetail)
                                                @if ( $userDetail->bank_id == $bank->id && $userDetail->user_type == "user")
                                                    {{ $userDetail->name }} <br>
                                                @endif
                                            @endforeach
                                        @endif 
                                    </div>
                                    <div class="col">
                                        <br>

                                        @if ($users ->isNotEmpty())
                                            @foreach ($users as $userDetail)
                                                @if ( $userDetail->bank_id == $bank->id && $userDetail->user_type == "user")
                                                    {{ $userDetail->user_contact_num }} <br>
                                                @endif
                                            @endforeach
                                        @endif 
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                    </div>
                </div> <br>
            @endforeach
        @endif
    </div>
</div>