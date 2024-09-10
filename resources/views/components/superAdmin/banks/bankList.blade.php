<div class="fs-4 text-center mt-4">
    <p>Bank Details</p>
</div>


<div class="px-2">
    <div class="p-2 mb-2 bg-black text-white rounded">
        <div class="d-flex justify-content-between">
            <div>ID | Bank Name | Address</div>
            <div>View</div>
        </div>
    </div>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        @if ($banks->isNotEmpty())
            @foreach ($banks as $key => $bank)
                <div class="accordion-item mb-2">
                    <h2 class="accordion-header" id="flush-heading{{ $key }}">
                        <button class="accordion-button collapsed d-flex justify-content-between align-items-center border-bottom border-dark rounded shado" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false" aria-controls="flush-collapse{{ $key }}">
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge text-bg-dark">{{ $bank->id }}</span>
                                    <span class="ms-2">{{ $bank->bank_name }},</span>
                                    <span class="ms-2"><small>{{ $bank->bank_address }}</small></span>
                                </div> 
                                <div></div>
                            </div>
                        </button>                       
                    </h2>
                    <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $key }}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body ">
                            <div class="bg-light text-dark px-4">

                                <div class="row">
                                    <div class="col">
                                        {{-- <span class="fw-light"> Bank Details </span> <br> --}}
                                        <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="table-primary">
                                              <tr>
                                                <td scope="col">registration done</td>
                                                <td scope="col">Bank Name</td>
                                                <td scope="col">Address</td>
                                                <td scope="col">Email</td>
                                                <td scope="col">Contact Number</td>
                                              </tr>
                                            </thead>
                                            <tbody class="fw-light">
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
                                        {{-- <span class="fw-light"> Administrators </span> <br> --}}
                                        <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="table-primary">
                                              <tr>
                                                <td scope="col" style="width: 30%">Administrators</td>
                                                <td scope="col">Contact Number</td>
                                                <td scope="col" class="text-center">status</td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @if ($users ->isNotEmpty())
                                                @foreach ($users as $userDetail)
                                                    @if ( $userDetail->bank_id == $bank->id && $userDetail->user_type == "administrator")
                                                        <tr class="fw-light">
                                                            <td style="width: 30%">{{ $userDetail->name }}</td>
                                                            <td>{{ $userDetail->user_contact_num }}</td>
                                                            <td class="text-center">
                                                                @if ($userDetail->status == "active")
                                                                <span class="badge text-bg-success py-1 px-3 m-2">{{ $userDetail->status }}</span>
                                                                @else
                                                                    <span class="badge text-bg-secondary py-1 px-2 m-2">{{ $userDetail->status }}</span>
                                                                @endif  
                                                            </td>
                                                            <td class="text-end">
                                                                <a href="{{ route('superAdmin.user.details',$userDetail->id) }}" type="button" class="btn btn-outline-primary btn-sm my-1">
                                                                    Manage
                                                                </a>
                                                            </td>
                                                            <td class="text-start" style="width: 20%">
                                                                <form action="{{ route('user.delete', $userDetail->id ) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-outline-danger btn-sm m-1" onclick="return confirm('Are you sure you want to delete this user?');">
                                                                        Remove
                                                                    </button>
                                                                </form>
                                                            </td>
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
                                        {{-- <span class="fw-light"> users </span> <br> --}}
                                        <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="table-primary">
                                              <tr>
                                                <td scope="col" style="width: 30%">Users</td>
                                                <td scope="col">Contact Number</td>
                                                <td scope="col" class="text-center">status</td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @if ($users ->isNotEmpty())
                                                @foreach ($users as $userDetail)
                                                    @if ( $userDetail->bank_id == $bank->id && $userDetail->user_type == "user")
                                                        <tr class="fw-light">
                                                            <td scope="col" style="width: 30%">{{ $userDetail->name }}</td>
                                                            <td scope="col">{{ $userDetail->user_contact_num }}</td>
                                                            <td class="text-center">
                                                                @if ($userDetail->status == "active")
                                                                <span class="badge text-bg-success py-1 px-3 m-2">{{ $userDetail->status }}</span>
                                                                @else
                                                                    <span class="badge text-bg-secondary py-1 px-2 m-2">{{ $userDetail->status }}</span>
                                                                @endif  
                                                            </td>
                                                            <td class="text-end">
                                                                <a href="{{ route('superAdmin.user.details',$userDetail->id) }}" type="button" class="btn btn-outline-primary btn-sm m-1">
                                                                    Manage
                                                                </a>
                                                            </td>
                                                            <td class="text-start" style="width: 20%">
                                                                <form action="{{ route('user.delete', $userDetail->id ) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-outline-danger btn-sm m-1" onclick="return confirm('Are you sure you want to delete this user?');">
                                                                        Remove
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif 
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>


                                <form action="{{ route('superAdmin.banks.delete', $bank->id ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('superAdmin.one.bank.view', $bank->id) }}" class="btn btn-primary" type="submit">Edit Bank</a>
                                        {{-- <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you sure to remove this Bank?');">Remove Bank</button> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- <br> --}}
                    </div>
                </div> 

                

            @endforeach
        @endif
    </div>
</div>