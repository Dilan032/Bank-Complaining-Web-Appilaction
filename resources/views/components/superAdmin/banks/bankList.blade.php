<div class="fs-2 text-center mt-4">
    <p>Bank Details</p>
</div>


<div class="px-2 mt-3 mb-4">
    <div class="p-2 mb-2 bg-black text-white rounded">
        <div class="d-flex justify-content-between">
            <div>ID | Bank Name | Address</div>
            <div>View</div>
        </div>
    </div>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        @if ($banks->isNotEmpty())
            @foreach ($banks as $key => $bank)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading{{ $key }}">
                        <button class="accordion-button collapsed d-flex justify-content-between align-items-center border-bottom border-dark rounded shado" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false" aria-controls="flush-collapse{{ $key }}">
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge text-bg-dark">{{ $bank->id }}</span>
                                    <span class="fw-bold ms-2">{{ $bank->bank_name }},</span>
                                    <span class="ms-2"><small>{{ $bank->bank_address }}</small></span>
                                </div> 
                                <div></div>
                            </div>
                        </button>                       
                    </h2>
                    <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $key }}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body ">
                            <div class="bg-light text-dark border-2 px-4 py-2 problemImageMainBG">

                                <div class="row">
                                    <div class="col">
                                        <span class="badge text-bg-dark"> Bank Details </span> <br>
                                        <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="table-primary">
                                              <tr>
                                                <th scope="col">Bank id</th>
                                                <th scope="col" class="text-center">registration done</th>
                                                <th scope="col">Bank Name</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Contact Number</th>
                                              </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                <td scope="col">{{ $bank->id }}</td>
                                                <td scope="col" class="text-center">
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
                                        <span class="badge text-bg-dark"> Administrators </span> <br>
                                        <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="table-primary">
                                              <tr>
                                                <th scope="col">id</th>
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
                                                                <span class="badge text-bg-success py-1 px-3 m-2">{{ $userDetail->status }}</span>
                                                                @else
                                                                    <span class="badge text-bg-secondary py-1 px-2 m-2">{{ $userDetail->status }}</span>
                                                                @endif  
                                                            </td>
                                                            <th class="text-center" style="width: 20%">
                                                                <form action="{{ route('user.delete', $userDetail->id ) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <a href="{{ route('superAdmin.user.details',$userDetail->id) }}" type="button" class="btn btn-outline-primary btn-sm my-1">
                                                                        Manage
                                                                    </a>
                                                                    
                                                                    <button type="button" class="btn btn-outline-danger btn-sm m-1" onclick="return confirm('Are you sure you want to delete this user?');">
                                                                        Remove
                                                                    </button>
                                                                </form>
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
                                        <span class="badge text-bg-dark"> users </span> <br>
                                        <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="table-primary">
                                              <tr>
                                                <th scope="col">id</th>
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
                                                            <td scope="col">{{ $userDetail->id }}</td>
                                                            <td scope="col" style="width: 30%">{{ $userDetail->name }}</td>
                                                            <td scope="col">{{ $userDetail->user_contact_num }}</td>
                                                            <td class="text-center">
                                                                @if ($userDetail->status == "active")
                                                                <span class="badge text-bg-success py-1 px-3 m-2">{{ $userDetail->status }}</span>
                                                                @else
                                                                    <span class="badge text-bg-secondary py-1 px-2 m-2">{{ $userDetail->status }}</span>
                                                                @endif  
                                                            </td>
                                                            <td class="text-center" style="width: 20%">
                                                                <form action="{{ route('user.delete', $userDetail->id ) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <a href="{{ route('superAdmin.user.details',$userDetail->id) }}" type="button" class="btn btn-outline-primary btn-sm m-1">
                                                                        Manage
                                                                    </a>
                                                                    
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
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you sure to remove this Bank?');">Remove Bank</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                    </div>
                </div> 

                <br>

            @endforeach
        @endif
    </div>
</div>