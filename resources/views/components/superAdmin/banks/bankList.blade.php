<div class="text-center mt-4 ms-4">
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
                                    <div class="col">
                                        <span class="badge text-bg-dark p-2"> Bank Details : </span> <br>
                                        <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="table-secondary">
                                              <tr>
                                                <th scope="col">Bank id</th>
                                                <th scope="col">Bank registration done</th>
                                                <th scope="col">Bank Name</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Contact Number</th>
                                              </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                <td scope="col">{{ $bank->id }}</td>
                                                <td scope="col">
                                                    {{ \Carbon\Carbon::parse($bank->created_at)->format('h:i A') }} <br>
                                                    {{ \Carbon\Carbon::parse($bank->created_at)->format('Y M d') }}
                                                </td>
                                                <td scope="col">{{ $bank->bank_name }}</td>
                                                <td scope="col">{{ $bank->bank_address }}</td>
                                                <td scope="col">{{ $bank->email }}</td>
                                                <td scope="col">{{ $bank->bank_contact_num }}</td>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="row">
                                    <div class="col">
                                        <span class="badge text-bg-dark p-2"> Administrators : </span> <br>
                                        <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="table-secondary">
                                              <tr>
                                                <th scope="col">U id</th>
                                                <th scope="col" style="width: 30%">Administrators</th>
                                                <th scope="col">Contact Number</th>
                                                <th scope="col" class="text-center">status</th>
                                                <th scope="col"></th>
                                              </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                            @if ($users ->isNotEmpty())
                                                @foreach ($users as $userDetail)
                                                    @if ( $userDetail->bank_id == $bank->id && $userDetail->user_type == "administrator")
                                                        <tr>
                                                            <th scope="row">{{ $userDetail->id }}</th>
                                                            <td style="width: 30%">{{ $userDetail->name }}</td>
                                                            <td>{{ $userDetail->user_contact_num }}</td>
                                                            <td class="text-center">
                                                                @if ($userDetail->status == "active")
                                                                <span class="badge text-bg-success fs-6">{{ $userDetail->status }}</span>
                                                                @else
                                                                    <span class="badge text-bg-secondary fs-6">{{ $userDetail->status }}</span>
                                                                @endif  
                                                            </td>
                                                            <th class="text-center" style="width: 20%">
                                                                <button type="button" class="btn btn-outline-primary btn-sm m-1">
                                                                    Manage
                                                                </button>
                                                                
                                                                <button type="button" class="btn btn-outline-danger btn-sm m-1">
                                                                    Remove
                                                                </button>
                                                            </th>
                                                        </tr>  
                                                    @endif
                                                @endforeach
                                            @endif   
                                            </tbody>
                                        </table>  
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="row">
                                    <div class="col">
                                        <span class="badge text-bg-dark p-2"> users : </span> <br>
                                        <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="table-secondary">
                                              <tr>
                                                <th scope="col">U id</th>
                                                <th scope="col" style="width: 30%">Users</th>
                                                <th scope="col">Contact Number</th>
                                                <th scope="col" class="text-center">status</th>
                                                <th scope="col"></th>
                                              </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                            @if ($users ->isNotEmpty())
                                                @foreach ($users as $userDetail)
                                                    @if ( $userDetail->bank_id == $bank->id && $userDetail->user_type == "user")
                                                        <tr>
                                                            <th scope="col">{{ $userDetail->id }}</th>
                                                            <th scope="col" style="width: 30%">{{ $userDetail->name }}</th>
                                                            <th scope="col">{{ $userDetail->user_contact_num }}</th>
                                                            <td class="text-center">
                                                                @if ($userDetail->status == "active")
                                                                <span class="badge text-bg-success fs-6">{{ $userDetail->status }}</span>
                                                                @else
                                                                    <span class="badge text-bg-secondary fs-6">{{ $userDetail->status }}</span>
                                                                @endif  
                                                            </td>
                                                            <th class="text-center" style="width: 20%">
                                                                <button type="button" class="btn btn-outline-primary btn-sm m-1">
                                                                    Manage
                                                                </button>
                                                                
                                                                <button type="button" class="btn btn-outline-danger btn-sm m-1">
                                                                    Remove
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif 
                                            </tbody>
                                        </table>
                                        </div>
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