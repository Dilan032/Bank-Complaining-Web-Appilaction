    <!-- Display validation errors -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    {{-- @else <div class="alert alert-success">
                <ul>
                    <li>Bank Registration successfully</li>
                </ul>
            </div> --}}
    @endif


<section class="border border-3 border-black rounded p-2 py-4 mb-5">
    <p class="text-center fs-2">Bank Registration Form</p>

    <form action="{{route('RegisterBank.save')}}" method="POST" class="mx-auto px-2">
        @csrf

        <div class="row">
            <div class="col-md-12 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" name="bank_name" class="form-control" id="floatingInput1" placeholder="Bank Name">
                    <label for="floatingInput1">Bank Name</label>
                </div>
            </div>
            <div class="col-md-12 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" name="bank_address" class="form-control" id="floatingInput2" placeholder="Bank address">
                    <label for="floatingInput2">Address</label>
                </div>
            </div>
            <div class="col-md-12 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" name="bank_contact_num" class="form-control" id="floatingInput3" placeholder="Bank Contact Number">
                    <label for="floatingInput3">Contact Number</label>
                </div>
            </div>
            <div class="col-md-12 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput4" placeholder="Email">
                    <label for="floatingInput4">Email</label>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Register Now</button>
            </div>

        </div>
    </form>
</section>

    