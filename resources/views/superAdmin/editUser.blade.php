@extends('layouts.superAdminLayout')
@section('SuperAdminContent')

    <span class="fs-1">Edit User</span> <br>
    <div class="d-flex justify-content-start">
        <div class="badge text-bg-dark p-2 px-4"> {{ $user->user_type }} {{ $user->name }} </div>
        <div class="mx-1">
            @if ($user->status == "active")
                <span class="badge text-bg-success fs-6 px-4">{{ $user->status }}</span>
            @else
                <span class="badge text-bg-secondary fs-6 px-4">{{ $user->status }}</span>
            @endif 
        </div>
    </div>

    <hr class="me-3">

    <!-- Display validation errors -->
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row px-4 justify-content-center mb-5">
        <div class="col-md-6 bg-white text-dark userBgShado p-4">
            {{-- @if($user) --}}
            <form action="{{ route('user.details.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">User name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}">
                </div>

                <label for="user_type" class="form-label fw-bold">user_type</label>
                <select name="user_type" class="form-select mb-3 fw-bold" aria-label="Default select example">
                    <option value="administrator" {{ old('user_type', $user->user_type) == 'administrator' ? 'selected' : '' }}>administrator</option>
                    <option value="user" {{ old('status', $user->user_type) == 'user' ? 'selected' : '' }}>user</option>  
                </select>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">User email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}">
                </div>

                <div class="mb-3">
                    <label for="cNumber" class="form-label fw-bold">User Contact Number</label>
                    <input type="text" name="user_contact_num" class="form-control" id="cNumber" value="{{ old('user_contact_num', $user->user_contact_num) }}">
                </div>

                <label for="status" class="form-label fw-bold">status</label>
                <select name="status" class="form-select mb-3 fw-bold bg-primary bg-opacity-25" aria-label="Default select example">
                    <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>active</option>
                    <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>inactive</option>  
                </select>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="submit">Update</button>
                  </div>
            </form>
        {{-- @else
            <p>User details could not be found.</p>
        @endif --}}
    </div>

    </div>

    




@endsection