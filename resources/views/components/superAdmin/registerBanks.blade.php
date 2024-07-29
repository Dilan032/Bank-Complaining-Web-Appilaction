<div class="container">
    <h2 class="text-center mt-5">Bank Registration Form</h2>

    <form action="#" method="POST" class="mx-auto">
        @csrf
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                
                <div class="form-floating mb-3">
                    <input type="text" name="bank_address" class="form-control" id="floatingInput" placeholder="Bank address">
                    <label for="floatingInput">Bank address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">User Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="telephone" class="form-control" id="floatingInput" placeholder="Telephone">
                    <label for="floatingInput">Telephone</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                {{-- <div class="form-floating mb-3">
                    <input type="password" name="re_password" class="form-control" id="floatingPassword" placeholder="Re/Password">
                    <label for="floatingPassword">Re/Password</label>
                </div> --}}
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>