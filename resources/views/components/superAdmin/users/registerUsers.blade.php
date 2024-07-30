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


<section class="border border-3 border-black rounded p-2 py-4 mb-5">
    <p class="text-center fs-2">User Registration Form</p>

    <form action="{{route('RegisterUser.save')}}" method="POST" class="mx-auto px-2">
        @csrf

        <div class="row">
            <div class="col-md-12 col-sm-4">
                <select name="bank_id" class="form-select form-select-lg mb-3 fs-6" aria-label="Large select example" required>
                    <option selected>Select Bank Name</option>
                    @if ($banks->isNotEmpty())
                        @foreach ($banks as $bank)
                            <option class="fw-bold" value="{{$bank->id}}" {{ old('bank_name') == $bank->bank_name ? 'selected' : '' }}> {{$bank->bank_name}} </option>
                        @endforeach
                    @endif  
                </select>
            </div>
            <div class="col-md-12 col-sm-4">
                <select name="user_type" class="form-select form-select-lg mb-3 fs-6" aria-label="Large select example" required>
                    <option selected>Select User Type</option>
                    <option value="administrator" class="fw-bold" {{ old('user_type') == 'administrator' ? 'selected' : '' }}>administrator</option>
                    <option value="user" class="fw-bold" {{ old('user_type') == 'user' ? 'selected' : '' }}>user</option>
                </select>
            </div>
            <div class="col-md-12 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="floatingInput2" placeholder="User Name" required>
                    <label for="floatingInput2">User Name</label>
                </div>
            </div>
            <div class="col-md-12 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="floatingInput3" placeholder="Email">
                    <label for="floatingInput3">Email</label>
                </div>
            </div>
            <div class="col-md-12 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" name="user_contact_num" value="{{ old('user_contact_num') }}"  class="form-control" id="floatingInput3" placeholder="User Contact Number" required>
                    <label for="floatingInput3">Contact Number</label>
                </div>
            </div>
            <div class="col-md-12 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingInput2" placeholder="password" required>
                    <label for="floatingInput2">Password</label>
                </div>
            </div>
            <div class="col-md-12 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" id="floatingInput2" placeholder="Confirm password" required>
                    <label for="floatingInput2">Confirm Password</label>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Register Now</button>
            </div>
            
        </div>
    </form>
</section>

    