@extends('layouts.administratorLayout')
@section('administratorContent')

    <span class="fs-1">Edit User</span> <br>
    <span class="badge text-bg-dark p-2"> {{ $user->user_type }} {{ $user->name }} </span>
        
    <hr class="me-3">

    <div class="row p-4 justify-content-center">
        <div class="col-md-6 bg-white text-dark userBgShado p-4">
            @if($user)
            <form>
                <div class="mb-3">
                <label for="useID" class="form-label fw-bold">User id</label>
                <input type="text" class="form-control" id="useID" value="{{ $user->id }}">
                </div>
                <div class="mb-3">
                <label for="name" class="form-label fw-bold">User name</label>
                <input type="text" class="form-control" id="name" value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                <label for="email" class="form-label fw-bold">User email</label>
                <input type="text" class="form-control" id="email" value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                <label for="cNumber" class="form-label fw-bold">User Contact Number</label>
                <input type="text" class="form-control" id="cNumber" value="{{ $user->user_contact_num }}">
                </div>
                <select class="form-select mb-3 fw-bold" aria-label="Default select example">
                    <option selected>{{ $user->status }}</option>
                    <option value="active">active</option>
                    <option value="active">inactive</option>
                </select>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary me-md-2" type="button">Update</button>
                  </div>
            </form>
        @else
            <p>User details could not be found.</p>
        @endif
    </div>

    </div>

    




@endsection