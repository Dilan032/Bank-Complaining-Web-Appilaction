@extends('layouts.administratorLayout')
@section('administratorContent')

<span class="fs-1">users</span>
<hr class="me-3">


{{-- btns for user register model --}}
<div class="d-grid mb-4 justify-content-end">
    <button class="btn btn-primary me-4" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Register Users</button>
</div>
    {{-- include model --}}
    @include('components.superAdmin.users.registerUsers')
    {{-- end user register section --}}

<h4 class=" p-2 text-center">Bank Administrators</h4>
<section class="container bg-white text-dark userBgShado py-2 rounded">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr class="text-start">
                    <th scope="col">Uid</th>
                    <th scope="col" style="width: 25%">Name</th>
                    <th scope="col" style="width: 30%">Email</th>
                    <th scope="col">C. Number</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col"></th>
                  </tr>
              </thead>
              <tbody class="table-group-divider">
                @if ($banks->isNotEmpty())
                    @foreach ($banks as $bankDetail)
                        @if ($users->isNotEmpty())
                            @foreach ($users as $userDetails)
                                @if ($bankDetail->id == $userDetails->bank_id && $userDetails->user_type == "administrator" )
                                    <tr class="text-start">
                                        <th scope="col">{{ $userDetails->id }}</th>
                                        <th scope="col" style="width: 25%">{{ $userDetails->name }}</th>
                                        <th scope="col" style="width: 30%">{{ $userDetails->email }}</th>
                                        <th scope="col">{{ $userDetails->user_contact_num }}</th>
                                        <th scope="col" class="text-center">
                                            @if ($userDetails->status == "active")
                                                <span class="badge text-bg-success px-4 mt-2">{{ $userDetails->status }}</span>
                                            @else
                                                <span class="badge text-bg-secondary px-3 mt-2">{{ $userDetails->status }}</span>
                                            @endif  
                                        </th>
                                        <th>
                                            
                                            
                                            <form action="{{ route('user.delete', $userDetails->id ) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('user.details',$userDetails->id) }}" type="button" class="btn btn-outline-primary btn-sm my-1">
                                                    Manage
                                                </a>

                                                <button type="submit" class="btn btn-outline-danger btn-sm my-1" onclick="return confirm('Are you sure you want to delete this user?');">
                                                    Remove
                                                </button>
                                            </form>
                                        </th>
                                      </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
              </tbody>
        </table>
      </div>
</section>


<h4 class=" p-2 text-center mt-5">Bank Employees</h4>
<section class="container bg-white text-dark userBgShado py-2 rounded">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr class="text-start">
                    <th scope="col">Uid</th>
                    <th scope="col" style="width: 25%">Name</th>
                    <th scope="col" style="width: 30%">Email</th>
                    <th scope="col">C. Number</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col"></th>
                  </tr>
              </thead>
              <tbody class="table-group-divider">
                @if ($banks->isNotEmpty())
                    @foreach ($banks as $bankDetail)
                        @if ($users->isNotEmpty())
                            @foreach ($users as $userDetails)
                                @if ($bankDetail->id == $userDetails->bank_id && $userDetails->user_type == "user" )
                                    <tr class="text-start">
                                        <th scope="col">{{ $userDetails->id }}</th>
                                        <th scope="col" style="width: 25%">{{ $userDetails->name }}</th>
                                        <th scope="col" style="width: 30%">{{ $userDetails->email }}</th>
                                        <th scope="col">{{ $userDetails->user_contact_num }}</th>
                                        <th scope="col" class="text-center">
                                            @if ($userDetails->status == "active")
                                                <span class="badge text-bg-success px-4 mt-2">{{ $userDetails->status }}</span>
                                            @else
                                                <span class="badge text-bg-secondary px-3 mt-2">{{ $userDetails->status }}</span>
                                            @endif  
                                        </th>
                                        <th>
                                            <form action="{{ route('user.delete', $userDetails->id ) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('user.details',$userDetails->id) }}" type="button" class="btn btn-outline-primary btn-sm my-1">
                                                    Manage
                                                </a>
                                                
                                                <button type="submit" class="btn btn-outline-danger btn-sm my-1" onclick="return confirm('Are you sure you want to delete this user?');">
                                                    Remove
                                                </button>
                                            </form>
                                        </th>
                                      </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
              </tbody>
        </table>
      </div>
</section>

@endsection